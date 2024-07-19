@extends('master')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="h3 mb-0" style="font-size: 25px; color: #0E1040; font-weight: 700;">Tambah User</h1>
                </div>

                {{-- <div class="my-3">
                    &nbsp;
                </div> --}}

                <div class="p-3">
                    <form action="{{ url('/register') }}" method="POST">
                        @csrf
                    <div class="username p-3">
                        Username 
                        <div class="input-group">
                            <input class="form-control text-field w-100" style="border-radius: 7px" type="username" name="username" id="username" placeholder="Enter your username">
                        </div>
                    </div>
    
                    <div class="pass p-3">
                        Password
                        <div class="input-group">
                            <input class="form-control text-field" style="border-radius: 7px 0 0 7px;" type="password" name="password" id="password" placeholder="Enter your password">
                            <div class="input-group-append">
                                <span class="input-group-text password-toggle" onclick="togglePasswordVisibility()" style="border-radius: 0 7px 7px 0; cursor: pointer;">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
    
                    <div class="role p-3">
                        Role
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="roleDropdownButton">
                                Pilih role
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="roleDropdownButton">
                                <li><a class="dropdown-item" href="#" onclick="setRole(1)">Admin</a></li>
                                <li><a class="dropdown-item" href="#" onclick="setRole(2)">Supervisor</a></li>
                                <li><a class="dropdown-item" href="#" onclick="setRole(3)">Operator</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <script>
                        function setRole(roleId) {
                            document.getElementById('role_id').value = roleId;
                        }
                    </script>
                    
                    
                    <div class="btnAdd p-3 d-flex justify-content-center">
                        <a href="#" class="login-button w-100 my-2" style="font-weight: 400;" data-bs-toggle='modal' data-bs-target='#addUser'>Tambah User</a>
                    </div>

                    {{-- Modal Tambah User --}}
                    <div class="modal fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header d-flex justify-content-center">
                            <h1 class="modal-title fs-5" id="addUserLabel" style="font-weight: 700; color:black">Tambah User</h1>
                            </div>
                            <div class="modal-body d-flex justify-content-center">
                            Are you sure want to add this user?
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                            <button type="submit" class="btn" data-bs-dismiss="modal" aria-label="Close" style="background-color: #0E1040; color: #ffffff">Add</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
                </div>

                <div class="my-2">
                    &nbsp;
                </div>
                <div class="my-2">
                    &nbsp;
                </div>

            </div>
            
        </div>

    </div>
    <script>
        function togglePasswordVisibility() {
        var passwordInput = document.getElementById('password');
        var icon = document.querySelector('.password-toggle i');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
    </script>
@stop