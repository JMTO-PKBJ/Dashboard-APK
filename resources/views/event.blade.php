@extends('master')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-0" style="font-size: 25px; color:#0E1040; font-weight:700">Data Event</h1>
        </div>

        <div class="card-body">
            <div class="d-flex">
                <div class="col-sm-3 ruas p-0">
                    Ruas
                    <div class="dropdown p-2">
                        <button class="btn btn-secondary dropdown-toggle w-75" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="roleDropdownButton" >
                            Pilih Ruas
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" onclick="setRole('Admin')">Admin</a></li>
                            <li><a class="dropdown-item" href="#" onclick="setRole('Monitoring')">Monitoring</a></li>
                            <li><a class="dropdown-item" href="#" onclick="setRole('Supervisor')">Supervisor</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-3 ruas p-0">
                    CCTV
                    <div class="dropdown p-2">
                        <button class="btn btn-secondary dropdown-toggle w-75" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="roleDropdownButton" >
                            Pilih Ruas
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" onclick="setRole('Admin')">Admin</a></li>
                            <li><a class="dropdown-item" href="#" onclick="setRole('Monitoring')">Monitoring</a></li>
                            <li><a class="dropdown-item" href="#" onclick="setRole('Supervisor')">Supervisor</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-3 ruas p-0">
                    Tanggal
                    <div class="dropdown p-2">
                        <button class="btn btn-secondary dropdown-toggle w-75" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="roleDropdownButton" >
                            Pilih Ruas
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" onclick="setRole('Admin')">Admin</a></li>
                            <li><a class="dropdown-item" href="#" onclick="setRole('Monitoring')">Monitoring</a></li>
                            <li><a class="dropdown-item" href="#" onclick="setRole('Supervisor')">Supervisor</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-3 ruas d-flex justify-content-between p-4">
                    <a class="addUser d-flex justify-content-center align-items-center" href="{{ url('addUser') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                            <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                        </svg>
                        <span class="ms-1">
                            Search
                        </span>
                    </a>
                    <a class="addUser d-flex justify-content-center align-items-center" style="background-color: #FECB05" href="{{ url('addUser') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                            <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                        </svg>
                        <span class="ms-1">
                            Export
                        </span>
                    </a>
                </div>

            </div>

            <div class="table-responsive my-2">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>CCTV</th>
                            <th>Class</th>
                            <th>Waktu</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>CCTV</th>
                            <th>Class</th>
                            <th>Waktu</th>
                            <th>Image</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        // Contoh 20 data dummy
                        $data = [
                            ["Cawang Uki", "Bus", "2024-06-24 17:26:44"],
                            ["Cilandak KKO", "Mobil", "2024-06-24 18:30:12"],
                            ["Tebet Barat", "Truck", "2024-06-25 08:45:22"],
                            ["Kuningan", "Mini Bus", "2024-06-25 10:00:00"],
                            ["Gatot Subroto", "Mobil", "2024-06-25 11:15:45"],
                            ["Mampang Prapatan", "Bus", "2024-06-25 12:20:35"],
                            ["Pancoran", "Mobil", "2024-06-25 14:50:10"],
                            ["Semanggi", "Truck", "2024-06-25 15:30:50"],
                            ["Slipi", "Mini Bus", "2024-06-25 16:45:25"],
                            ["Palmerah", "Mobil", "2024-06-25 17:55:15"],
                            ["Sudirman", "Bus", "2024-06-25 18:40:20"],
                            ["Thamrin", "Truck", "2024-06-25 19:30:05"],
                            ["Senayan", "Mobil", "2024-06-25 20:45:30"],
                            ["Permata Hijau", "Mini Bus", "2024-06-25 21:50:45"],
                            ["Kebayoran Lama", "Bus", "2024-06-26 08:20:10"],
                            ["Pondok Indah", "Truck", "2024-06-26 09:30:50"],
                            ["Puri Indah", "Mobil", "2024-06-26 10:45:05"],
                            ["Kembangan", "Mini Bus", "2024-06-26 11:55:30"],
                            ["Kebon Jeruk", "Bus", "2024-06-26 13:10:40"],
                            ["Tomang", "Mobil", "2024-06-26 14:25:55"],
                        ];
                
                        // Iterasi data untuk menampilkan baris tabel
                        foreach ($data as $key => $row) {
                            $cctv = $row[0];
                            $class = $row[1];
                            $waktu = $row[2];
                            $nomor = $key + 1; // Menghitung nomor urut (dimulai dari 1)
                
                            echo "<tr>";
                            echo "<td>$nomor</td>";
                            echo "<td>$cctv</td>";
                            echo "<td>$class</td>";
                            echo "<td>$waktu</td>";
                            echo "<td>
                                    <a href='#'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='icon-border bi bi-eye' viewBox='0 0 16 16'>
                                            <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z'/>
                                            <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0'/>
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
@stop