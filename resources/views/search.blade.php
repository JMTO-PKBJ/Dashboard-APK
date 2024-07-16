<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Events by Date Range</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        label, input {
            display: block;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Search Events by Date Range</h1>
    <form id="searchForm">
        <label for="start_date">Start Date (YYYY-MM-DD):</label>
        <input type="date" id="start_date" name="start_date" required>
        
        <label for="end_date">End Date (YYYY-MM-DD):</label>
        <input type="date" id="end_date" name="end_date" required>
        
        <button type="submit">Search</button>
    </form>
    <table id="resultsTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>CCTV ID</th>
                <th>Event Time</th>
                <th>Event Location</th>
                <th>Event Class</th>
                <th>Event Image</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <script>
        document.getElementById('searchForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const startDate = document.getElementById('start_date').value;
            const endDate = document.getElementById('end_date').value;
            
            fetch(`/events/search?start_date=${startDate}&end_date=${endDate}`)
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('resultsTable').getElementsByTagName('tbody')[0];
                    tableBody.innerHTML = '';
                    if (data.length === 0) {
                        const row = tableBody.insertRow();
                        const cell = row.insertCell(0);
                        cell.colSpan = 6;
                        cell.textContent = 'No events found for the selected date range.';
                    } else {
                        data.forEach(event => {
                            const row = tableBody.insertRow();
                            row.insertCell(0).textContent = event.id;
                            row.insertCell(1).textContent = event.cctv_id;
                            row.insertCell(2).textContent = event.event_waktu;
                            row.insertCell(3).textContent = event.event_lokasi;
                            row.insertCell(4).textContent = event.event_class;
                            row.insertCell(5).textContent = event.event_gambar;
                        });
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>
