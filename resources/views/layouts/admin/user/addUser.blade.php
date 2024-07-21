@extends('master')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0" style="font-size: 25px; color: #0E1040; font-weight: 700;">Tambah User</h1>
            </div>

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
                        <input class="form-control text-field" style="border-radius: 7px" type="password" name="password" id="password" placeholder="Enter your password">
                        <div class="input-group-append">
                            <span class="input-group-text password-toggle" onclick="togglePasswordVisibility()" style="border-radius: 0 7px 7px 0; cursor: pointer;">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                </div>
                        
                <div class="role p-3">
                    Role
                    <div class="custom-select-wrapper">
                        <div class="selected-role">Select Role</div>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" data-value="1">Admin</a>
                            <a class="dropdown-item" href="#" data-value="2">Supervisor</a>
                            <a class="dropdown-item" href="#" data-value="3">Operator</a>
                        </div>
                        <select class="custom-select" name="role_id" id="role_id" hidden>
                            <option value="1">Admin</option>
                            <option value="2">Supervisor</option>
                            <option value="3">Operator</option>
                        </select>
                    </div>
                </div>
                        
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var selectWrapper = document.querySelector('.custom-select-wrapper');
            var selectedRole = selectWrapper.querySelector('.selected-role');
            var dropdownMenu = selectWrapper.querySelector('.dropdown-menu');
            var select = document.getElementById('role_id');

            selectedRole.addEventListener('click', function() {
                dropdownMenu.classList.toggle('show');
            });

            dropdownMenu.addEventListener('click', function(event) {
                if (event.target.classList.contains('dropdown-item')) {
                    var roleText = event.target.textContent;
                    var roleValue = event.target.getAttribute('data-value');
                    selectedRole.textContent = roleText;
                    select.value = roleValue;
                    dropdownMenu.classList.remove('show'); 
                }
            });

            document.addEventListener('click', function(event) {
                if (!selectWrapper.contains(event.target)) {
                    dropdownMenu.classList.remove('show');
                }
            });
        });

        function setRole(role) {
            document.getElementById('roleDropdownButton').textContent = role;
            var select = document.getElementById('role_id');
            var options = select.options;
            for (var i = 0; i < options.length; i++) {
                if (options[i].text === role) {
                select.value = options[i].value;
                break;
                }
            }
        }

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