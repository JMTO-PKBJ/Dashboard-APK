<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- CSS --}}  
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.min.css')}}">

    {{-- Custom Fonts --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    {{-- Custom Table --}}
    <link href="datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    
</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('includes.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="margin-left: 224px;">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('includes.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid" style="margin-top: 90px;">

                    <!-- Page Heading -->
                    

                    <!-- DataTales Example -->
                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>© 2024 Deteksi Bahu Tol JMTO | V 1.0.0</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a id="scrollToTop" class="scroll-to-top rounded d-flex justify-content-center align-items-center" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Logout Modal-->
    @include('includes.logout')

    {{-- Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Set initial active class for Dashboard link
            const dashboardLink = document.querySelector('a.nav-link[href="{{ url('dashboard') }}"]');
            if (dashboardLink) {
                dashboardLink.style.fontWeight = 'normal'; // Set normal font weight initially
            }

            // Add click event listeners to all nav links
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function (event) {
                    event.preventDefault(); // Prevent default link behavior
                    
                    // Remove active class from all nav links
                    navLinks.forEach(nav => {
                        nav.classList.remove('active');
                        nav.style.fontWeight = 'normal'; // Set normal font weight for all links
                        nav.style.color = ''; // Remove custom color
                    });

                    // Add active class to the clicked link
                    this.classList.add('active');
                    this.style.fontWeight = 'bold'; // Set bold font weight for the clicked link

                    // Check if the text content matches "Lihat CCTV" or "Tambah CCTV"
                    const linkText = this.textContent.trim();
                    if (linkText === 'Lihat CCTV' || linkText === 'Tambah CCTV') {
                        // Set custom color (light blue) for specific links
                        this.style.color = '#007bff'; // Light blue color
                    } else {
                        // If it's the main CCTV link, keep it bold but not blue
                        const cctvLink = document.querySelector('a.nav-link[href="{{ url('cctv') }}"]');
                        if (cctvLink) {
                            cctvLink.classList.add('active');
                            cctvLink.style.fontWeight = 'bold';
                        }
                    }

                    // Optionally, you can handle navigation to the link's href
                    const href = this.getAttribute('href');
                    if (href && href !== '#') {
                        window.location.href = href;
                    }
                });

                // Check if the current URL matches any nav link and set it as active
                if (window.location.href === link.href) {
                    link.classList.add('active');
                    link.style.fontWeight = 'bold';
                }
            });
        });

    </script>
    @include('includes.script')

</body>
</html>