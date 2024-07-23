@extends('layouts.OPERATOR.master')
@section('content')

    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="font-size: 25px; color:#0E1040; font-weight:700">Dashboard</h1>
            <a class="date d-flex align-items-center justify-content-center" href="#" style="text-decoration: none">
                <input type="text" id="datePickerChart" class="form-control p-1" readonly >
                <span id="filterIcon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="#0E1040" class="bi bi-filter" viewBox="0 0 16 16">
                        <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5"/>
                    </svg>
                </span>
            </a>
        </div>

        <div class="row">

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-custom shadow h-100 py-2" style="border-left: 4px solid #0E1040;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #0E1040">
                                    CCTV Event Terbanyak</div>
                                <div class="h5 result mb-0 font-weight-bold text-gray-800" id="mostFrequentLocation"></div>
                            </div>
                            <div class="col-auto">
                                <svg class="text-gray-300" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-camera-video" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1z"/>
                                </svg>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-custom shadow h-100 py-2" style="border-left: 4px solid #FECB05;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #FECB05">
                                    Jumlah Event Tertinggi</div>
                                <div class="h5 result mb-0 font-weight-bold text-gray-800" id="highestEventCount"></div>
                            </div>
                            <div class="col-auto">
                                <svg class="text-gray-300" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-graph-up" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M0 0h1v15h15v1H0zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-custom shadow h-100 py-2" style="border-left: 4px solid #0E1040;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #0E1040">
                                    Jenis Kendaraan Terbanyak</div>
                                <div class="h5 result mb-0 font-weight-bold text-gray-800" id="mostFrequentVehicleType"></div>
                            </div>
                            <div class="col-auto">
                                <svg class="text-gray-300" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                                    <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold" style="font-size: 20px;  color: #0E1040;">Grafik CCTV Top 4 Terbanyak</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold" style="font-size: 20px;  color: #0E1040;">Jenis Kendaraan Terbanyak</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small" id="legend-container">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <script>
        $(document).ready(function() {
            $('#datePickerChart').daterangepicker({
                opens: 'center',
                showDropdowns: true,
                timePicker: false,
                locale: {
                    format: 'D MMMM YYYY',
                    separator: ' - ',
                    applyLabel: 'Pilih',
                    cancelLabel: 'Batal',
                    customRangeLabel: 'Rentang Kustom',
                    daysOfWeek: ['Mg', 'Sn', 'Sl', 'Rb', 'Km', 'Jm', 'Sb'],
                    monthNames: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                    firstDay: 1
                },
                ranges: {
                    'Sekarang': [moment(), moment()],
                    'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
                    'Bulan Lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                    'Tahun Ini': [moment().startOf('year'), moment().endOf('year')],
                    'Tahun Lalu': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
                }
            }, function(start, end, label) {
                $('#datePickerChart').val(start.format('D MMMM YYYY') + ' - ' + end.format('D MMMM YYYY'));
                fetchDashboardData(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
                fetchLineChartData(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
                fetchPieChartData(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
            });
    
            $('#filterIcon').click(function(e) {
                e.preventDefault();
                $('#datePickerChart').click();
            });
    
            $('#datePickerChart').val(moment().startOf('month').format('D MMMM YYYY') + ' - ' + moment().endOf('month').format('D MMMM YYYY'));
    
            fetchDashboardData(moment().startOf('month').format('YYYY-MM-DD'), moment().endOf('month').format('YYYY-MM-DD'));
            fetchLineChartData(moment().startOf('month').format('YYYY-MM-DD'), moment().endOf('month').format('YYYY-MM-DD'));
            fetchPieChartData(moment().startOf('month').format('YYYY-MM-DD'), moment().endOf('month').format('YYYY-MM-DD'));
    
            function fetchDashboardData(startDate, endDate) {
                $.ajax({
                    url: '{{ route("dashboard.data") }}',
                    type: 'GET',
                    data: {
                        start_date: startDate,
                        end_date: endDate
                    },
                    success: function(data) {
                        $('#mostFrequentLocation').text(data.mostFrequentLocation ? 'CCTV ' + data.mostFrequentLocation : 'N/A');
                        $('#highestEventCount').text(data.highestEventCount || 'N/A');
                        $('#mostFrequentVehicleType').text(data.mostFrequentVehicleType || 'N/A');
                    }
                    
                });
            }
    
            function fetchLineChartData(startDate, endDate) {
                $.ajax({
                    url: '{{ route("event.location.data") }}',
                    type: 'GET',
                    data: {
                        start_date: startDate,
                        end_date: endDate
                    },
                    success: function(data) {
                        updateLineChart(data.labels, data.data);
                    }
                });
            }
    
            function updateLineChart(labels, data) {
                myLineChart.data.labels = labels;
                myLineChart.data.datasets[0].data = data;
                myLineChart.update();
            }
    
            function fetchPieChartData(startDate, endDate) {
                $.ajax({
                    url: '{{ route("event.class.data") }}',
                    type: 'GET',
                    data: {
                        start_date: startDate,
                        end_date: endDate
                    },
                    success: function(data) {
                        updatePieChart(data.labels, data.data);
                    }
                });
            }
    
            function updatePieChart(labels, data) {
                myPieChart.data.labels = labels;
                myPieChart.data.datasets[0].data = data;
                myPieChart.update();
            }
        });
    </script>
    
@stop