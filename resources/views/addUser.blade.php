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
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="roleDropdownButton" >
                                Pilih role
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" onclick="setRole('Admin')">Admin</a></li>
                                <li><a class="dropdown-item" href="#" onclick="setRole('Monitoring')">Monitoring</a></li>
                                <li><a class="dropdown-item" href="#" onclick="setRole('Supervisor')">Supervisor</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="btnAdd p-3 d-flex justify-content-center">
                        <a href="#" class="login-button w-100 my-2" style="font-weight: 400;">Tambah User</a>
                    </div>
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
@stop