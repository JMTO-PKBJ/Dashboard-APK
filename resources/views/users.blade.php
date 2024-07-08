@extends('master')
@section('content')
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="h3 mb-0" style="font-size: 25px; color: #0E1040; font-weight: 700;">Users</h1>

                    
                    <a class="addUser d-flex justify-content-center align-items-center" href="{{ url('addUser') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                            <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                        </svg>
                        <span class="ms-1">
                            Tambah User
                        </span>
                    </a>
                </div>
            </div>
            

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            // Contoh 20 data dummy
                            $data = [
                                ["Velman", "Admin"],
                                ["Benaya", "Monitoring"],
                                ["user3", "Supervisor"],
                                ["user4", "Admin"],
                                ["user5", "Monitoring"],
                                ["user6", "Supervisor"],
                                ["user7", "Admin"],
                                ["user8", "Monitoring"],
                                ["user9", "Supervisor"],
                                ["user10", "Admin"],
                                ["user11", "Monitoring"],
                                ["user12", "Supervisor"],
                                ["user13", "Admin"],
                                ["user14", "Monitoring"],
                                ["user15", "Supervisor"],
                                ["user16", "Admin"],
                                ["user17", "Monitoring"],
                                ["user18", "Supervisor"],
                                ["user19", "Admin"],
                                ["user20", "Monitoring"],
                            ];
                    
                            // Iterasi data untuk menampilkan baris tabel
                            foreach ($data as $key => $row) {
                                $username = $row[0];
                                $role = $row[1];
                                $nomor = $key + 1; // Menghitung nomor urut (dimulai dari 1)
                    
                                echo "<tr>";
                                echo "<td>$nomor</td>";
                                echo "<td>$username</td>";
                                echo "<td>$role</td>";
                                echo "<td>
                                        <a class='editUser' data-bs-toggle='modal' data-bs-target='#editUser'>
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
                                    </td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                    {{-- Edit User Modal --}}
                    <div class="modal fade" id="editUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editUserLabel" style="font-size: 25px; color: #0E1040; font-weight: 700;" >Edit User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="username p-3">
                                    Username 
                                    <div class="input-group">
                                        <input class="form-control text-field w-100" style="border-radius: 7px" type="username" name="username" placeholder="Username" required autofocus>
                                    </div>
                                </div>
                
                                <div class="newPass p-3">
                                    New Password
                                    <div class="input-group">
                                        <input class="form-control text-field" style="border-radius: 7px 0 0 7px;" type="password" name="password" id="password" placeholder="Enter your new password">
                                        <div class="input-group-append">
                                            <span class="input-group-text password-toggle" onclick="togglePasswordVisibility()" style="border-radius: 0 7px 7px 0; cursor: pointer;">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="role p-3">
                                    Role
                                    <select class="form-select" aria-label="Default select example">
                                        <option value="Admin">Admin</option>
                                        <option value="Monitoring">Monitoring</option>
                                        <option value="Supervisor">Supervisor</option>
                                    </select>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="btn" data-bs-target="#confirmModal" data-bs-toggle="modal" style="background-color: #0E1040; color: #ffffff">Confirm</button>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="confirmModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header d-flex justify-content-center">
                                <h1 class="modal-title fs-5" id="confirmModalLabel" style="font-weight: 700; color:black">Edit User</h1>
                                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                            </div>
                            <div class="modal-body d-flex justify-content-center">
                                Are you sure want to edit this user?
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button class="btn btn-secondary" data-bs-target="#editUser" data-bs-toggle="modal">Back</button>
                                <button type="button" class="btn" style="background-color: #0E1040; color: #ffffff">Accept</button>
                            </div>
                            </div>
                        </div>
                    </div>
                        
                    {{-- Delete Modal --}}
                    <div class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header d-flex justify-content-center">
                            <h1 class="modal-title fs-5" id="deleteLabel" style="font-weight: 700; color:black">Delete Account</h1>
                            </div>
                            <div class="modal-body d-flex justify-content-center">
                            Are you sure want to delete this user?
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@stop