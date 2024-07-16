<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Most Frequent Event Location</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        label, input, select {
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
    <h1>Most Frequent Event Location</h1>
    <form id="searchForm">
        <label for="dateRange">Date Range:</label>
        <select id="dateRange" name="dateRange">
            <option value="custom">Custom</option>
            <option value="today">Today</option>
            <option value="yesterday">Yesterday</option>
            <option value="last_week">Last 1 Week</option>
            <option value="last_month">Last 1 Month</option>
            <option value="last_year">Last 1 Year</option>
        </select>
        
        <label for="start_date">Start Date (YYYY-MM-DD):</label>
        <input type="date" id="start_date" name="start_date" required>
        
        <label for="end_date">End Date (YYYY-MM-DD):</label>
        <input type="date" id="end_date" name="end_date" required>
        
        <button type="submit">Search</button>
    </form>
    <table id="resultsTable">
        <thead>
            <tr>
                <th>CCTV ID</th>
                <th>Location</th>
                <th>Total Events</th>
                <th>Most Frequent Event Class</th>
                <th>Total Events for Class</th>
                <th>Total Events in Range</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <script>
        document.getElementById('dateRange').addEventListener('change', function() {
            const selectedRange = this.value;
            const today = new Date();
            let startDate, endDate;

            switch (selectedRange) {
                case 'custom':
                    document.getElementById('start_date').style.display = 'block';
                    document.getElementById('end_date').style.display = 'block';
                    document.getElementById('start_date').setAttribute('required', true);
                    document.getElementById('end_date').setAttribute('required', true);
                    break;
                case 'today':
                    startDate = endDate = today.toISOString().split('T')[0];
                    document.getElementById('start_date').style.display = 'none';
                    document.getElementById('end_date').style.display = 'none';
                    document.getElementById('start_date').removeAttribute('required');
                    document.getElementById('end_date').removeAttribute('required');
                    break;
                case 'yesterday':
                    const yesterday = new Date(today);
                    yesterday.setDate(today.getDate() - 1);
                    startDate = endDate = yesterday.toISOString().split('T')[0];
                    document.getElementById('start_date').style.display = 'none';
                    document.getElementById('end_date').style.display = 'none';
                    document.getElementById('start_date').removeAttribute('required');
                    document.getElementById('end_date').removeAttribute('required');
                    break;
                case 'last_week':
                    startDate = new Date(today);
                    startDate.setDate(today.getDate() - 7);
                    endDate = new Date(today);
                    endDate.setDate(today.getDate() - 1);
                    startDate = startDate.toISOString().split('T')[0];
                    endDate = endDate.toISOString().split('T')[0];
                    document.getElementById('start_date').style.display = 'none';
                    document.getElementById('end_date').style.display = 'none';
                    document.getElementById('start_date').removeAttribute('required');
                    document.getElementById('end_date').removeAttribute('required');
                    break;
                case 'last_month':
                    startDate = new Date(today);
                    startDate.setMonth(today.getMonth() - 1);
                    startDate.setDate(1);
                    endDate = new Date(today);
                    endDate.setDate(0);
                    startDate = startDate.toISOString().split('T')[0];
                    endDate = endDate.toISOString().split('T')[0];
                    document.getElementById('start_date').style.display = 'none';
                    document.getElementById('end_date').style.display = 'none';
                    document.getElementById('start_date').removeAttribute('required');
                    document.getElementById('end_date').removeAttribute('required');
                    break;
                case 'last_year':
                    startDate = new Date(today);
                    startDate.setFullYear(today.getFullYear() - 1);
                    startDate.setMonth(0);
                    startDate.setDate(1);
                    endDate = new Date(today);
                    endDate.setFullYear(today.getFullYear() - 1);
                    endDate.setMonth(11);
                    endDate.setDate(31);
                    startDate = startDate.toISOString().split('T')[0];
                    endDate = endDate.toISOString().split('T')[0];
                    document.getElementById('start_date').style.display = 'none';
                    document.getElementById('end_date').style.display = 'none';
                    document.getElementById('start_date').removeAttribute('required');
                    document.getElementById('end_date').removeAttribute('required');
                    break;
                default:
                    startDate = endDate = today.toISOString().split('T')[0];
                    document.getElementById('start_date').style.display = 'none';
                    document.getElementById('end_date').style.display = 'none';
                    document.getElementById('start_date').removeAttribute('required');
                    document.getElementById('end_date').removeAttribute('required');
                    break;
            }

            if (selectedRange !== 'custom') {
                document.getElementById('start_date').value = startDate;
                document.getElementById('end_date').value = endDate;
                document.querySelector('label[for="start_date"]').style.display = 'none';
                document.querySelector('label[for="end_date"]').style.display = 'none';
            } else {
                document.querySelector('label[for="start_date"]').style.display = 'block';
                document.querySelector('label[for="end_date"]').style.display = 'block';
            }
        });

        document.getElementById('searchForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const startDate = document.getElementById('start_date').value;
            const endDate = document.getElementById('end_date').value;
            
            fetch(`/events/most-frequent-location?start_date=${startDate}&end_date=${endDate}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    const contentType = response.headers.get('content-type');
                    if (!contentType || !contentType.includes('application/json')) {
                        throw new Error('Expected JSON response from server');
                    }
                    return response.json();
                })
                .then(data => {
                    const tableBody = document.getElementById('resultsTable').getElementsByTagName('tbody')[0];
                    tableBody.innerHTML = '';
                    if (data.message) {
                        const row = tableBody.insertRow();
                        const cell = row.insertCell(0);
                        cell.colSpan = 6;
                        cell.textContent = data.message;
                    } else {
                        const row = tableBody.insertRow();
                        row.insertCell(0).textContent = data.cctv_id;
                        row.insertCell(1).textContent = `CCTV ${data.location}`;
                        row.insertCell(2).textContent = data.total_events;
                        row.insertCell(3).textContent = data.most_frequent_event_class;
                        row.insertCell(4).textContent = data.total_events_for_class;
                        row.insertCell(5).textContent = data.total_events_in_range;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    const tableBody = document.getElementById('resultsTable').getElementsByTagName('tbody')[0];
                    tableBody.innerHTML = '';
                    const row = tableBody.insertRow();
                    const cell = row.insertCell(0);
                    cell.colSpan = 6;
                    cell.textContent = 'An error occurred. Please try again later.';
                });
        });
    </script>
</body>
</html>
