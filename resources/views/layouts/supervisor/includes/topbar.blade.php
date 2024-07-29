<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top" style="position: fixed; top: 0; width: calc(100% - 224px); z-index: 1000; left: 224px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <h1 class="m-0" style="font-weight: 500; font-size: 18px; color:#000000">Monitoring Bahu Jalan Tol - JMTO</h1>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline" style="font-size: 16px; color:#0E1040">
                    @auth <!-- Hanya tampilkan jika user sudah login -->
                        {{ auth()->user()->username }}
                    @endauth
                </span>
                <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">

            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>
</nav>
