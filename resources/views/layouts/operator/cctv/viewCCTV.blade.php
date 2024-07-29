@extends('layouts.operator.master')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0" style="font-size: 25px; color:#0E1040; font-weight:700">CCTV</h1>
        <div id="gridIcon" class="grid-icon" onclick="toggleLayout()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid" viewBox="0 0 16 16">
                <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5z"/>
            </svg>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row" id="imageContainer">
            @foreach($cctvs as $cctv)
                <div class="col-6 cctv d-flex flex-column">
                    <div class="card view-cctv" style="border: none;">
                        <div class="card-header p-0">
                            <h1 style="color: #000000; font-size: 18px; font-weight: bold;">CCTV {{ $cctv->cctv_lokasi }}</h1>
                        </div>
                        <div class="card-body p-0">
                            <video id="cctv-video-{{ $cctv->id }}" class="video-js vjs-default-skin w-100" height="300px" controls preload="auto" autoplay muted>
                                <source src="{{ $cctv->cctv_video }}" type="application/x-mpegURL">
                                Your browser does not support the video tag.
                            </video>   
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @foreach($cctvs as $cctv)
                var player = videojs('cctv-video-{{ $cctv->id }}');
                player.muted(true);  
                player.play();      
            @endforeach
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            changeLayout(2); 
        });

        var currentLayout = 2;

        function toggleLayout() {
            if (currentLayout === 2) {
                currentLayout = 3;
            } else if (currentLayout === 3) {
                currentLayout = 4;
            } else {
                currentLayout = 2;
            }
            changeLayout(currentLayout);
            updateIcon();
        }

        function changeLayout(columns) {
            var container = document.getElementById('imageContainer');
            container.className = 'row';
            var colClass = 'col-' + (12 / columns);
            for (var i = 0; i < container.children.length; i++) {
                container.children[i].className = colClass + ' cctv mb-3 d-flex flex-column';
            }

        }

        function updateIcon() {
            var iconContainer = document.getElementById('gridIcon');
            iconContainer.innerHTML = '';

            if (currentLayout === 2) {
                iconContainer.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid" viewBox="0 0 16 16">
                    <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5z"/>
                </svg>`;
            } else if (currentLayout === 3) {
                iconContainer.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid-3x3-gap" viewBox="0 0 16 16">
                    <path d="M4 2v2H2V2zm1 12v-2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1m0-5V7a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1m0-5V2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1m5 10v-2a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1m0-5V7a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1m0-5V2a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1M9 2v2H7V2zm5 0v2h-2V2zM4 7v2H2V7zm5 0v2H7V7zm5 0h-2v2h2zM4 12v2H2v-2zm5 0v2H7v-2zm5 0v2h-2v-2zM12 1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm-1 6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm1 4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1z"/>
                </svg>`;
            } else {
                iconContainer.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="custom-grid-4x4" viewBox="0 0 24 24">
                    <rect x="1" y="1" width="4" height="4" fill="none" stroke="currentColor" stroke-width="1.5" rx="1" ry="1" />
                    <rect x="7" y="1" width="4" height="4" fill="none" stroke="currentColor" stroke-width="1.5" rx="1" ry="1" />
                    <rect x="13" y="1" width="4" height="4" fill="none" stroke="currentColor" stroke-width="1.5" rx="1" ry="1" />
                    <rect x="19" y="1" width="4" height="4" fill="none" stroke="currentColor" stroke-width="1.5" rx="1" ry="1" />
                    <rect x="1" y="7" width="4" height="4" fill="none" stroke="currentColor" stroke-width="1.5" rx="1" ry="1" />
                    <rect x="7" y="7" width="4" height="4" fill="none" stroke="currentColor" stroke-width="1.5" rx="1" ry="1" />
                    <rect x="13" y="7" width="4" height="4" fill="none" stroke="currentColor" stroke-width="1.5" rx="1" ry="1" />
                    <rect x="19" y="7" width="4" height="4" fill="none" stroke="currentColor" stroke-width="1.5" rx="1" ry="1" />
                    <rect x="1" y="13" width="4" height="4" fill="none" stroke="currentColor" stroke-width="1.5" rx="1" ry="1" />
                    <rect x="7" y="13" width="4" height="4" fill="none" stroke="currentColor" stroke-width="1.5" rx="1" ry="1" />
                    <rect x="13" y="13" width="4" height="4" fill="none" stroke="currentColor" stroke-width="1.5" rx="1" ry="1" />
                    <rect x="19" y="13" width="4" height="4" fill="none" stroke="currentColor" stroke-width="1.5" rx="1" ry="1" />
                    <rect x="1" y="19" width="4" height="4" fill="none" stroke="currentColor" stroke-width="1.5" rx="1" ry="1" />
                    <rect x="7" y="19" width="4" height="4" fill="none" stroke="currentColor" stroke-width="1.5" rx="1" ry="1" />
                    <rect x="13" y="19" width="4" height="4" fill="none" stroke="currentColor" stroke-width="1.5" rx="1" ry="1" />
                    <rect x="19" y="19" width="4" height="4" fill="none" stroke="currentColor" stroke-width="1.5" rx="1" ry="1" />
                </svg>`;
        }}
    </script>
@stop
