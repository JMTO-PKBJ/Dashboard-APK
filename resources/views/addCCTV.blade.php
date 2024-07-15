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
                        @foreach($cctvs as $cctv)
                            <tr>
                                <td>{{ $cctv->id }}</td>
                                <td>{{ $cctv->cctv_ruas }}</td>
                                <td>CCTV {{ $cctv->cctv_lokasi }}</td>
                                <td>{{ $cctv->created_at }}</td>
                                <td>
                                    <a href="#" class="viewCCTV" data-bs-toggle="modal" data-bs-target="#viewCCTV-{{ $cctv->id }}" data-id="{{ $cctv->id }}">
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='icon-border bi bi-eye' viewBox='0 0 16 16'>
                                            <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z'/>
                                            <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0'/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                {{-- Modal Tampil CCTV --}}
                @foreach($cctvs as $cctv)
                    <div class="modal fade" id="viewCCTV-{{ $cctv->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewCCTVLabel-{{ $cctv->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="viewCCTVLabel-{{ $cctv->id }}" style="font-size: 25px; color: #0E1040; font-weight: 700;">CCTV {{ $cctv->cctv_lokasi }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="d-flex justify-content-center">
                                        <video id="cctv-video-{{ $cctv->id }}" class="video-js vjs-default-skin w-100 video-addCCTV" controls preload="auto" autoplay muted>
                                            <source src="{{ $cctv->cctv_video }}" type="application/x-mpegURL">
                                            Your browser does not support the video tag.
                                        </video>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- End Modal Tampil CCTV --}}

            </div>
            

        </div>
    </div>

    {{-- Video CCTV --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @foreach($cctvs as $cctv)
                var player = videojs('cctv-video-{{ $cctv->id }}');
                player.muted(true);  
                player.play();       
            @endforeach
        });
    </script>

    {{-- No Search --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var labels = document.getElementsByTagName('label');
            for (var i = 0; i < labels.length; i++) {
                if (labels[i].textContent.trim() === 'Search:') {
                    labels[i].style.display = 'none';
                    break;
                }
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            var labels = document.querySelectorAll('label[for^="search"]');
            var inputs = document.querySelectorAll('input[type="search"].form-control.form-control-sm');

            for (var i = 0; i < labels.length; i++) {
                labels[i].style.display = 'none';
            }
            for (var j = 0; j < inputs.length; j++) {
                inputs[j].style.display = 'none';
            }
        });
    </script>
@stop