{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCTV Detail</title>
    <!-- Stylesheets -->
    <link href="https://vjs.zencdn.net/7.2.3/video-js.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .video-container {
            position: relative;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }
        .video-container video {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-3">CCTV Detail</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $cctv->cctv_ruas }}</h5>
                <div class="embed-responsive embed-responsive-16by9">
                    <video id="cctv-video" class="video-js vjs-default-skin" controls>
                        <source src="{{ $cctv->cctv_video }}" type="application/x-mpegURL">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/video.js/7.10.2/video.min.js"></script>
    <script src="https://vjs.zencdn.net/7.2.3/video.js"></script>
    <script>
        var player = videojs('cctv-video');
        player.play();
    </script>
</body>
</html> --}}

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All CCTV Videos</title>
    <!-- Stylesheets -->
    <link href="https://vjs.zencdn.net/7.2.3/video-js.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .video-container {
            position: relative;
            width: 100%;
            max-width: 800px;
            margin: 0 auto 20px;
        }
        .video-container video {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-3">All CCTV Videos</h1>
        @foreach($cctvs as $cctv)
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $cctv->cctv_ruas }}</h5>
                    <p class="card-text">Location: {{ $cctv->cctv_lokasi }}</p>
                    <p class="card-text">Status: {{ $cctv->cctv_status }}</p>
                    <div class="video-container">
                        <video id="cctv-video-{{ $cctv->id }}" class="video-js vjs-default-skin" controls preload="auto">
                            <source src="{{ $cctv->cctv_video }}" type="application/x-mpegURL">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/video.js/7.10.2/video.min.js"></script>
    <script src="https://vjs.zencdn.net/7.2.3/video.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @foreach($cctvs as $cctv)
                var player = videojs('cctv-video-{{ $cctv->id }}');
                player.play();
            @endforeach
        });
    </script>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All CCTV Videos</title>
    <!-- Stylesheets -->
    <link href="https://vjs.zencdn.net/7.2.3/video-js.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .video-container {
            position: relative;
            width: 100%;
            max-width: 800px;
            margin: 0 auto 20px;
        }
        .video-container video {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-3">All CCTV Videos</h1>
        @foreach($cctvs as $cctv)
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $cctv->cctv_ruas }}</h5>
                    <p class="card-text">Location: {{ $cctv->cctv_lokasi }}</p>
                    <p class="card-text">Status: {{ $cctv->cctv_status }}</p>
                    <div class="video-container">
                        <video id="cctv-video-{{ $cctv->id }}" class="video-js vjs-default-skin" controls preload="auto" autoplay muted>
                            <source src="{{ $cctv->cctv_video }}" type="application/x-mpegURL">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/video.js/7.10.2/video.min.js"></script>
    <script src="https://vjs.zencdn.net/7.2.3/video.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @foreach($cctvs as $cctv)
                var player = videojs('cctv-video-{{ $cctv->id }}');
                player.muted(true);  // Ensure the video is muted
                player.play();       // Auto-play the video
            @endforeach
        });
    </script>
</body>
</html>


