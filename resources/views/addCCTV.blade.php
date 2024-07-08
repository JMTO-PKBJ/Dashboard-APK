@extends('master')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-0" style="font-size: 25px; color:#0E1040; font-weight:700">Tambah CCTV </h1>
        </div>

        <div class="card-body">
            <div class="d-flex">
                <div class="col-sm-3 ruas p-0">
                    Ruas
                    <div class="dropdown w-75 p-2">
                        <button class="btn btn-outline-secondary dropdown-toggle w-100 d-flex justify-content-between align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="ruasDropdownButton">
                            <span>Pilih Ruas</span>
                            <span class="dropdown-toggle-icon"></span>
                        </button>
                        <ul class="dropdown-menu" id="ruasDropdownMenu">
                            <li><a class="dropdown-item" href="#" onclick="setDropdownValue('ruasDropdownButton', 'Dalam Kota')">Dalam Kota</a></li>
                            <li><a class="dropdown-item" href="#" onclick="setDropdownValue('ruasDropdownButton', 'Jakarta-Tangerang')">Jakarta-Tangerang</a></li>
                            <li><a class="dropdown-item" href="#" onclick="setDropdownValue('ruasDropdownButton', 'Jagorawi')">Jagorawi</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-3 lokasi p-0">
                    Lokasi CCTV
                    <div class="dropdown w-75 p-2">
                        <button class="btn btn-outline-secondary dropdown-toggle w-100 d-flex justify-content-between align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="lokasiDropdownButton">
                            <span>Pilih Lokasi CCTV</span>
                            <span class="dropdown-toggle-icon"></span>
                        </button>
                        <ul class="dropdown-menu" id="lokasiDropdownMenu">
                            <li><a class="dropdown-item" href="#" onclick="setDropdownValue('lokasiDropdownButton', 'Cawang Uki')">Cawang Uki</a></li>
                            <li><a class="dropdown-item" href="#" onclick="setDropdownValue('lokasiDropdownButton', 'Kuningan')">Kuningan</a></li>
                            <li><a class="dropdown-item" href="#" onclick="setDropdownValue('lokasiDropdownButton', 'Pancoran')">Pancoran</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-sm-3 cctv p-0">
                    Nama CCTV
                    <div class="input-group p-2">
                        <input class="form-control text-field w-100" style="border-radius: 7px" type="cctvName" name="cctvName" id="cctvName" placeholder="Enter CCTV Name">
                    </div>
                </div>
                
                <div class="col-sm-3 ruas d-flex justify-content-center p-4">
                    <a class="addBtn d-flex justify-content-center align-items-center" style="background-color: #6484E1" data-bs-toggle="modal" data-bs-target='#confirmAddCCTV'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                        </svg>
                        <span class="ms-2">
                            Tambah CCTV
                        </span>
                    </a>
                </div>

                {{-- Confirmation Modal --}}
                <div class="modal fade" id="confirmAddCCTV" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmAddCCTVLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header d-flex justify-content-center">
                            <h1 class="modal-title fs-5" id="confirmAddCCTVLabel" style="font-weight: 700; color:black">Add CCTV</h1>
                        </div>
                        <div class="modal-body d-flex justify-content-center">
                            Are you sure want to add this CCTV?
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-secondary" data-bs-target="#editUser" data-bs-toggle="modal">Back</button>
                            <button type="button" class="btn" style="background-color: #0E1040; color: #ffffff" data-bs-dismiss="modal" aria-label="Close">Accept</button>
                        </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="table-responsive my-2">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Ruas</th>
                            <th>CCTV</th>
                            <th>Create At</th>
                            <th>Live CCTV</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Ruas</th>
                            <th>CCTV</th>
                            <th>Create At</th>
                            <th>Live CCTV</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        // Contoh 20 data dummy dengan tambahan data Ruas dan menghapus Class
                        $data = [
                            ["Dalam Kota", "Cawang Uki", "2024-06-24 17:26:44"],
                            ["Jalan Raya", "Cilandak KKO", "2024-06-24 18:30:12"],
                            ["Tol", "Tebet Barat", "2024-06-25 08:45:22"],
                            ["Kawasan Bisnis", "Kuningan", "2024-06-25 10:00:00"],
                            ["Jalan Utama", "Gatot Subroto", "2024-06-25 11:15:45"],
                            ["Dalam Kota", "Mampang Prapatan", "2024-06-25 12:20:35"],
                            ["Jalan Raya", "Pancoran", "2024-06-25 14:50:10"],
                            ["Tol", "Semanggi", "2024-06-25 15:30:50"],
                            ["Kawasan Bisnis", "Slipi", "2024-06-25 16:45:25"],
                            ["Jalan Utama", "Palmerah", "2024-06-25 17:55:15"],
                            ["Dalam Kota", "Sudirman", "2024-06-25 18:40:20"],
                            ["Jalan Raya", "Thamrin", "2024-06-25 19:30:05"],
                            ["Tol", "Senayan", "2024-06-25 20:45:30"],
                            ["Kawasan Bisnis", "Permata Hijau", "2024-06-25 21:50:45"],
                            ["Jalan Utama", "Kebayoran Lama", "2024-06-26 08:20:10"],
                            ["Dalam Kota", "Pondok Indah", "2024-06-26 09:30:50"],
                            ["Jalan Raya", "Puri Indah", "2024-06-26 10:45:05"],
                            ["Tol", "Kembangan", "2024-06-26 11:55:30"],
                            ["Kawasan Bisnis", "Kebon Jeruk", "2024-06-26 13:10:40"],
                            ["Jalan Utama", "Tomang", "2024-06-26 14:25:55"],
                        ];
                
                        // Iterasi data untuk menampilkan baris tabel
                        foreach ($data as $key => $row) {
                            $ruas = $row[0];
                            $cctv = $row[1];
                            $createat = $row[2];
                            $nomor = $key + 1; // Menghitung nomor urut (dimulai dari 1)
                
                            echo "<tr>";
                            echo "<td>$nomor</td>";
                            echo "<td>$ruas</td>";
                            echo "<td>$cctv</td>";
                            echo "<td>$createat</td>";
                            echo "<td>
                                    <a class='viewCCTV' data-bs-toggle='modal' data-bs-target='#viewCCTV'>
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

                {{-- View CCTV --}}
                <div class="modal fade" id="viewCCTV" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewCCTVLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="viewCCTVLabel" style="font-size: 25px; color: #0E1040; font-weight: 700;">Image</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('images/event_image.png') }}" alt="" style="max-width: 100%; height: auto;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            

        </div>
    </div>
@stop