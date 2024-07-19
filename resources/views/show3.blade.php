<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah CCTV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-input {
            display: none;
        }
    </style>
</head>
<body>
<div class="container mt-5">
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
    
    <!-- Tabel CCTV yang sudah ada -->
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <h2 class="h5 mb-0" style="font-size: 20px; color:#0E1040; font-weight:700">Daftar CCTV</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ruas</th>
                        <th>Lokasi</th>
                        <th>Link CCTV</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cctvs as $cctv)
                        <tr>
                            <td>{{ $cctv->id }}</td>
                            <td>{{ $cctv->cctv_ruas }}</td>
                            <td>{{ $cctv->cctv_lokasi }}</td>
                            <td><a href="{{ $cctv->cctv_video }}" target="_blank">Lihat Video</a></td>
                            <td>{{ $cctv->cctv_status }}</td>
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
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function toggleCustomInput(selectElement, customInputId) {
        var selectedValue = selectElement.value;
        var customInput = document.getElementById(customInputId);

        if (selectedValue === 'custom') {
            customInput.style.display = 'block'; // Show custom input
            customInput.focus(); // Focus on the custom input
        } else {
            customInput.style.display = 'none'; // Hide custom input
            customInput.value = ''; // Clear the custom input value
        }
    }

    function handleFormSubmit() {
        var cctvRuasSelect = document.getElementById('cctvRuas');
        var cctvRuasCustom = document.getElementById('cctvRuasCustom');
        var cctvLokasiSelect = document.getElementById('cctvLokasi');
        var cctvLokasiCustom = document.getElementById('cctvLokasiCustom');

        // If 'custom' is selected, replace the value with custom input value
        if (cctvRuasSelect.value === 'custom') {
            cctvRuasSelect.name = ''; // Clear the original select name
            cctvRuasCustom.name = 'cctv_ruas'; // Set the name to be sent
        } else {
            cctvRuasSelect.name = 'cctv_ruas'; // Set the name to be sent
            cctvRuasCustom.name = ''; // Clear the custom input name
        }

        if (cctvLokasiSelect.value === 'custom') {
            cctvLokasiSelect.name = ''; // Clear the original select name
            cctvLokasiCustom.name = 'cctv_lokasi'; // Set the name to be sent
        } else {
            cctvLokasiSelect.name = 'cctv_lokasi'; // Set the name to be sent
            cctvLokasiCustom.name = ''; // Clear the custom input name
        }

        return true; // Allow form submission
    }
</script>
</body>
</html>
