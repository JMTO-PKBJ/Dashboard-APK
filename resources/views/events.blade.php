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
                    <div class="dropdown w-75 p-2">
                        <button class="btn btn-outline-secondary dropdown-toggle w-100 d-flex justify-content-between align-items-center"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false" id="ruasDropdownButton">
                            <span>Pilih Ruas</span>
                            <span class="dropdown-toggle-icon"></span>
                        </button>
                        <ul class="dropdown-menu" id="ruasDropdownMenu">
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 ruas p-0">
                    CCTV
                    <div class="dropdown w-75 p-2" id="cctvDropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle w-100 d-flex justify-content-between align-items-center"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false" id="cctvDropdownButton" disabled>
                            <span>Pilih Lokasi CCTV</span>
                            <span class="dropdown-toggle-icon"></span>
                        </button>
                        <ul class="dropdown-menu" id="cctvDropdownMenu">
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 tanggal p-0">
                    <label for="datePickerInput">Tanggal</label>
                    <input type="text" id="datePickerInput" class="form-control" readonly>
                </div>
                <div class="col-sm-3 ruas d-flex justify-content-center align-items-center">
                    <a class="eventBtn cari d-flex justify-content-center align-items-center mx-2" style="background-color: #6484E1" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg>
                        <span class="ms-1">Cari</span>
                    </a>
                    <form method="GET" action="{{ route('exportPDF') }}" class="d-inline" >
                        <input type="hidden" name="ruas" id="ruasHidden" value="">
                        <input type="hidden" name="location" id="locationHidden" value="">
                        <input type="hidden" name="start_date" id="startDateHidden" value="">
                        <input type="hidden" name="end_date" id="endDateHidden" value="">
                    
                        <button type="submit" class="eventBtn export d-flex justify-content-center align-items-center" style="background-color: #FECB05; border: none;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1"/>
                            </svg>
                            <span class="ms-2">Export</span>
                        </button>
                    </form>
                    
                    
                    
                    
                </div>
            </div>

            <div class="table-responsive my-2">
                <table class="table tableEvent table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>CCTV</th>
                            <th>Kelas</th>
                            <th>Waktu</th>
                            <th>Gambar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>CCTV</th>
                            <th>Kelas</th>
                            <th>Waktu</th>
                            <th>Gambar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @foreach($events as $event)
    <div class="modal fade" id="viewCCTV-{{ $event->event_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewCCTVLabel-{{ $event->event_id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="viewCCTVLabel-{{ $event->event_id }}" style="font-size: 25px; color: #0E1040; font-weight: 700;">CCTV {{ $event->event_lokasi }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <img src="{{ $event->event_gambar }}" alt="" class="event-gambar w-100">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <script>
        $('.eventBtn.export').on('click', function() {
            var ruas = $('#ruasDropdownButton span:first-child').text();
            var location = $('#cctvDropdownButton span:first-child').text();
            var dateRange = $('#datePickerInput').val().split(' - ');
            var start = dateRange[0];
            var end = dateRange[1];

            $('#ruasHidden').val(ruas);
            $('#locationHidden').val(location);
            $('#startDateHidden').val(start);
            $('#endDateHidden').val(end);
        });
        
        $(document).ready(function() {
            $.ajax({
                url: '{{ route("getCctvRuas") }}',
                method: 'GET',
                success: function(response) {
                    var ruasDropdown = $('#ruasDropdownMenu');
                    ruasDropdown.empty();
                    $.each(response, function(index, ruas) {
                        ruasDropdown.append('<li><a class="dropdown-item ruas-item" href="#" data-ruas="' + ruas + '">' + ruas + '</a></li>');
                    });
                }
            });

            $(document).on('click', '.ruas-item', function(e) {
                e.preventDefault();
                var ruas = $(this).data('ruas');
                $('#ruasDropdownButton span:first-child').text(ruas);
                $('#cctvDropdownButton').prop('disabled', false);

                $.ajax({
                    url: '{{ route("getCctvLocations") }}',
                    method: 'GET',
                    data: { ruas: ruas },
                    success: function(response) {
                        var cctvDropdown = $('#cctvDropdownMenu');
                        cctvDropdown.empty();
                        $.each(response, function(index, location) {
                            cctvDropdown.append('<li><a class="dropdown-item cctv-item" href="#" data-location="' + location + '">' + location + '</a></li>');
                        });
                    }
                });
            });

            $(document).on('click', '.cctv-item', function(e) {
                e.preventDefault();
                var location = $(this).data('location');
                $('#cctvDropdownButton span:first-child').text(location);
            });

            $('#datePickerInput').daterangepicker({
                opens: 'center',
                showDropdowns: true,
                timePicker: true,
                timePicker24Hour: true,
                locale: {
                    format: 'YYYY-MM-DD HH:mm:ss',
                    separator: ' - ',
                    applyLabel: 'Apply',
                    cancelLabel: 'Cancel',
                    customRangeLabel: 'Custom Range',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                },
                ranges: {
                    'Sekarang': [moment(), moment()],
                    'Hari Ini': [moment().startOf('day'), moment().endOf('day')],
                    'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    '7 Hari Terakhir': [moment().subtract(6, 'days'), moment()],
                    '30 Hari Terakhir': [moment().subtract(29, 'days'), moment()],
                    'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
                    'Bulan Lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                    'Tahun Ini': [moment().startOf('year'), moment().endOf('year')],
                    'Tahun Lalu': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
                },
                startDate: moment().startOf('day').format('YYYY-MM-DD 00:00:00'),
                endDate: moment().endOf('day').format('YYYY-MM-DD 23:59:59')
            }, function(start, end, label) {
                $('#datePickerInput').val(start.format('YYYY-MM-DD HH:mm:ss') + ' - ' + end.format('YYYY-MM-DD HH:mm:ss'));
            });

            $('#datePickerInput').val(moment().startOf('day').format('YYYY-MM-DD 00:00:00') + ' - ' + moment().endOf('day').format('YYYY-MM-DD 23:59:59'));


            $('.eventBtn.cari').on('click', function(e) {
                e.preventDefault();
                var ruas = $('#ruasDropdownButton span:first-child').text();
                var location = $('#cctvDropdownButton span:first-child').text();
                var dateRange = $('#datePickerInput').val().split(' - ');
                var start = dateRange[0];
                var end = dateRange[1];

                $.ajax({
                    url: '{{ route("getData") }}',
                    method: 'GET',
                    data: {
                        ruas: ruas,
                        location: location,
                        start_date: start,
                        end_date: end
                    },
                    success: function(response) {
                        var tableBody = $('#dataTable tbody');
                        tableBody.empty();
                        $.each(response, function(index, event) {
                            tableBody.append('<tr>' +
                                '<td>' + (index + 1) + '</td>' +
                                '<td>' + 'CCTV ' + event.event_lokasi + '</td>' +
                                '<td>' + event.event_class + '</td>' +
                                '<td>' + event.event_waktu + '</td>' +
                                '<td>' +
                                '<a href="#" class="viewCCTV" data-bs-toggle="modal" data-bs-target="#viewCCTV-' + event.event_id + '" data-id="' + event.event_id + '">' +
                                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icon-border bi bi-eye" viewBox="0 0 16 16">' +
                                '<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>' +
                                '<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>' +
                                '</svg>' +
                                '</a>' +
                                '</td>' +
                                '</tr>');
                        });
                    }
                });
            });

            $(document).on('click', '.viewCCTV', function(e) {
                e.preventDefault();
                var eventId = $(this).data('id');
                $('#viewCCTV-' + eventId).modal('show');
            });
        });

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

@endsection
