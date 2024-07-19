<!DOCTYPE html>
<html>
<head>
    <title>Users List</title>
    <style>
        .update-form {
            display: none;
        }
    </style>
    <script>
        function showUpdateForm(id) {
            document.getElementById('update-form-' + id).style.display = 'block';
        }
    </script>
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
                        <button onclick="showUpdateForm({{ $user['id'] }})">Update</button>
                        <form action="{{ url('api/users/' . $user['id']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                <tr id="update-form-{{ $user['id'] }}" class="update-form">
                    <td colspan="4">
                        <form action="{{ url('api/users/' . $user['id']) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label for="username-{{ $user['id'] }}">Username:</label>
                            <input type="text" name="username" id="username-{{ $user['id'] }}" value="{{ $user['username'] }}" required>
                            <label for="password-{{ $user['id'] }}">Password:</label>
                            <input type="password" name="password" id="password-{{ $user['id'] }}">
                            <label for="role_id-{{ $user['id'] }}">Role ID:</label>
                            <input type="number" name="role_id" id="role_id-{{ $user['id'] }}" va lue="{{ $user['role_id'] ?? '' }}" required>
                            <button type="submit">Save</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ url('users/export/csv') }}">Download CSV Users</a>
</body>
</html>
