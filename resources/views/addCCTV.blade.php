@extends('master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-0" style="font-size: 25px; color:#0E1040; font-weight:700">Tambah CCTV</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('cctv.store') }}" method="POST" onsubmit="return handleFormSubmit()">
                @csrf
                <div class="mb-3">
                    <label for="cctvRuas" class="form-label">Ruas</label>
                    <div class="input-group">
                        <select class="form-select" name="cctv_ruas" id="cctvRuas" onchange="toggleCustomInput(this, 'cctvRuasCustom')">
                            <option value="" selected>Pilih ruas</option>
                            @foreach($cctvRuas as $ruas)
                                <option value="{{ $ruas }}">{{ $ruas }}</option>
                            @endforeach
                            <option value="custom">Lainnya...</option>
                        </select>
                        <input type="text" class="form-control custom-input" id="cctvRuasCustom" name="cctv_ruas_custom" placeholder="Masukkan ruas lain">
                    </div>
                </div>
                <input type="hidden" name="roles_id" value="1">
                <div class="mb-3">
                    <label for="cctvLokasi" class="form-label">Lokasi CCTV</label>
                    <div class="input-group">
                        <select class="form-select" name="cctv_lokasi" id="cctvLokasi" onchange="toggleCustomInput(this, 'cctvLokasiCustom')">
                            <option value="" selected>Pilih lokasi CCTV</option>
                            @foreach($cctvLokasi as $lokasi)
                                <option value="{{ $lokasi }}">{{ $lokasi }}</option>
                            @endforeach
                            <option value="custom">Lainnya...</option>
                        </select>
                        <input type="text" class="form-control custom-input" id="cctvLokasiCustom" name="cctv_lokasi_custom" placeholder="Masukkan lokasi lain">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="cctvVideo" class="form-label">Link CCTV</label>
                    <input type="url" class="form-control" name="cctv_video" id="cctvVideo" placeholder="Masukkan link CCTV (format .m3u8)" required>
                </div>
                <input type="hidden" name="cctv_status" value="on">
                <button type="submit" class="btn btn-primary">Tambah CCTV</button>
            </form>
        </div>
    </div>

    <!-- CCTV Table -->
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-0" style="font-size: 25px; color:#0E1040; font-weight:700">Daftar CCTV</h1>
        </div>
        <div class="table-responsive my-2 p-3">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Ruas</th>
                        <th>Lokasi</th>
                        <th>CCTV</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse($cctvs as $cctv)
                        <tr>
                            <td>{{ $cctv->id }}</td>
                            <td>{{ $cctv->cctv_ruas }}</td>
                            <td>CCTV {{ $cctv->cctv_lokasi }}</td>
                            <td>
                            <a href="#" class="viewCCTV" data-bs-toggle="modal" data-bs-target="#viewCCTV-{{ $cctv->id }}" data-id="{{ $cctv->id }}">
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='icon-border bi bi-eye' viewBox='0 0 16 16'>
                                    <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z'/>
                                    <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0'/>
                                </svg>
                            </a>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data CCTV</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @foreach($cctvs as $cctv)
    <div class="modal fade" id="viewCCTV-{{ $cctv->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewCCTVLabel-{{ $cctv->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="viewCCTVLabel-{{ $cctv->id }}" style="font-size: 25px; color:#0E1040; font-weight:700">CCTV {{ $cctv->cctv_lokasi }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe id="iframe_{{ $cctv->id }}" class="embed-responsive-item" src="{{ $cctv->cctv_video }}" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <script>
        function toggleCustomInput(selectElement, customInputId) {
            var customInput = document.getElementById(customInputId);
            if (selectElement.value === 'custom') {
                customInput.style.display = 'block';
            } else {
                customInput.style.display = 'none';
                customInput.value = '';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            var viewCCTVLinks = document.querySelectorAll('.viewCCTV');
            viewCCTVLinks.forEach(function(link) {
                link.addEventListener('click', function() {
                    var cctvId = link.getAttribute('data-id');
                    var iframe = document.getElementById('iframe_' + cctvId);
                    iframe.src = iframe.src; // Refresh iframe source
                });
            });
        });

        function handleFormSubmit() {
            var ruasSelect = document.getElementById('cctvRuas');
            var ruasCustom = document.getElementById('cctvRuasCustom');
            var lokasiSelect = document.getElementById('cctvLokasi');
            var lokasiCustom = document.getElementById('cctvLokasiCustom');

            if (ruasSelect.value === 'custom') {
                ruasCustom.setAttribute('name', 'cctv_ruas');
                ruasSelect.removeAttribute('name');
            }

            if (lokasiSelect.value === 'custom') {
                lokasiCustom.setAttribute('name', 'cctv_lokasi');
                lokasiSelect.removeAttribute('name');
            }

            return true; 
        }
        
    </script>

    @push('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
            });
        });
    </script>
    @endpush
@endsection
