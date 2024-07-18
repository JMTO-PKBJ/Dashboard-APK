<!DOCTYPE html>
<html>
<head>
    <title>Users List</title>
</head>
<body>
    <h1>Users List</h1>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users->reverse() as $index => $user)
                <tr>
                    <td>{{ count($users) - $index }}</td>
                    <td>{{ $user['username'] }}</td>
                    <td>{{ $user['role'] }}</td>
                    <td>
                        <a href="{{ url('api/users/' . $user['id'] . '/edit') }}">Update</a>
                        <form action="{{ url('api/users/' . $user['id']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ url('users/export/csv') }}">Download CSV Users</a>
</body>
</html>
