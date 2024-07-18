<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    {{-- CSS --}}  
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.min.css')}}">

    {{-- Custom Fonts --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="bg-gradient-light">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9 my-5"> 

                {{-- <div class="card o-hidden border-0 shadow-lg my-5"> --}}
                    <div class="border border-black login-cont d-flex my-5" style="border-radius: 20px">
                        <div class="col-xl-6 image-container p-0">
                            <img src="{{ asset('images/jalantol_login.png') }}" alt="Login Image">
                        </div>
                        <div class="col-xl-6 text-container d-flex flex-column">
                            <img class="my-4" style="width: 35%" src="{{ asset('images/jasamarga_icon.png') }}" alt="">
                            <h1 style="font-size: 18px; font-style: italic; font-weight:400; color:#000000;">Login</h1>
                            <form class="row w-75 my-2 "method="POST" action="{{ route('login') }}"">
                                @csrf
                            <div>
                                <p class="m-0" style="font-size: 13px">Username</p>
                                <input class="form-control text-field w-100" style="border-radius: 7px" type="text" name="username" id="username" placeholder="Enter your username" required>
                            </div>
                            <div>
                                <p class="m-0" style="font-size: 13px">Password</p>
                                <div class="input-group">
                                    <input class="form-control text-field w-100" style="border-radius: 7px" type="password" name="password" id="password" placeholder="Enter your password" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text password-toggle" onclick="togglePasswordVisibility()" style="border: none">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <button class="login-button w-75 my-2" style="font-weight: 400;" type="submit">Login</button>
                            {{-- <a href="{{ url('dashboard') }}" class="login-button w-75 my-2" style="font-weight: 400;">Login</a> --}}
                        </form>
                        <p>© 2024 Deteksi Bahu Tol JMTO| V 1.0.0</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    {{-- JS --}}
    {{-- <script src="{{ asset('js/main.js') }}"></script> --}}
</body>
</html>
