<!DOCTYPE html>
<html>
<head>
    <title>Events List</title>
</head>
<body>
    <h1>Events List</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>CCTV ID</th>
                <th>Waktu</th>
                <th>Lokasi</th>
                <th>Class</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events->reverse() as $index => $event)
                <tr>
                    <td>{{ $event->event_id }}</td>
                    <td>{{ $event->cctv_id }}</td>
                    <td>{{ $event->event_waktu }}</td>
                    <td>{{ $event->event_lokasi }}</td>
                    <td>{{ $event->event_class }}</td>
                    <td><img src="{{ url($event->event_gambar) }}" alt="Event Gambar" style="width: 100px; height: auto;"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ url('events/export/pdf') }}">Download PDF</a>
</body>
</html>
