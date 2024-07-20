<!DOCTYPE html>
<html>
<head>
    <title>Users List</title>
    <style>
        /* Form update selalu ditampilkan */
        .update-form {
            display: table-row;
        }
    </style>
    <script>
        function fillEditForm(userId, username, roleId) {
            document.getElementById('editUserForm').action = '/api/users/' + userId;
            document.getElementById('editUsername').value = username;
            document.getElementById('editRoleId').value = roleId;
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
                        <a class='editUser' data-bs-toggle='modal' data-bs-target='#editUser' data-user-id='{{ $user['id'] }}' data-username='{{ $user['username'] }}' data-role-id='{{ $user['role_id'] ?? '' }}' onclick="fillEditForm('{{ $user['id'] }}', '{{ $user['username'] }}', '{{ $user['role_id'] ?? '' }}')">
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='icon-border icon-borderbi bi-pencil-square' viewBox='0 0 16 16'>
                                <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                            </svg>
                        </a>

                        <a class='deletebtn' data-bs-toggle='modal' data-bs-target='#delete'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='icon-border-delete bi bi-trash' viewBox='0 0 16 16'>
                                <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
                                <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
                            </svg>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Edit User Modal --}}
    <div class="modal fade" id="editUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editUserLabel" style="font-size: 25px; color: #0E1040; font-weight: 700;">Edit User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" >
                    <form id="editUserForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="username p-3">
                            Username 
                            <div class="input-group">
                                <label for="editUsername"></label>
                                <input class="form-control text-field w-100" style="border-radius: 7px" type="text" name="username" id="editUsername" required>
                            </div>
                        </div>

                        <div class="newPass p-3">
                            New Password
                            <div class="input-group">
                                <label for="editPassword"></label>
                                <input class="form-control text-field" style="border-radius: 7px 0 0 7px;" type="password" name="password" id="editPassword" placeholder="Enter your new password">
                                <div class="input-group-append">
                                    <span class="input-group-text password-toggle" onclick="togglePasswordVisibility()" style="border-radius: 0 7px 7px 0; cursor: pointer;">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="role p-3">
                            Role
                            <select class="form-select" name="role_id" id="editRoleId" aria-label="Default select example">
                                <option value="1">Admin</option>
                                <option value="2">Supervisor</option>
                                <option value="3">Operator</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn" type="submit" style="background-color: #0E1040; color: #ffffff">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
