@extends('layouts.SUPERVISOR.master')
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
@stop