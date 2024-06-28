@extends('master')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h3 mb-0" style="font-size: 25px; color:#0E1040; font-weight:700">Users</h1>
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
                                        <a href='#'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='icon-border icon-borderbi bi-pencil-square' viewBox='0 0 16 16'>
                                                <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                                <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                                            </svg>
                                        </a>
                                        <a href='#'>
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
                    
                </div>
            </div>
        </div>

    </div>
@stop