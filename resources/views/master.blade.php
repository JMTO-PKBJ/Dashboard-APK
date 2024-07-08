<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="icon" href="{{ asset('images/jasamarga_icon.png') }}">
    
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    {{-- CSS --}}  
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.min.css')}}">

    {{-- Custom Fonts --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    {{-- Custom Table --}}
    <link href="datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    {{-- Active Nav & Role --}}
    <script>
        // Active Nav
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

        function setRole(role) {
            document.getElementById('roleDropdownButton').textContent = role;
        }

        function setDropdownValue(dropdownId, value) {
            document.getElementById(dropdownId).textContent = value;
        }
    </script>

    {{-- Layout CCTV --}}
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
            }
        }
    </script>

    {{-- Edit User Modal --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.editUser').forEach(function (editBtn) {
                editBtn.addEventListener('click', function () {
                    var username = this.parentNode.parentNode.children[1].innerText.trim(); 
                    var role = this.parentNode.parentNode.children[2].innerText.trim(); 
                    var modal = document.getElementById('editUser');
                    modal.querySelector('input[name="username"]').value = username; 
                    var roleSelect = modal.querySelector('select');
                    roleSelect.value = role; 
                });
            });
        });
    </script>

    {{-- Dropdown Menu --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            adjustDropdownWidth('ruasDropdownButton', 'ruasDropdownMenu');
            adjustDropdownWidth('lokasiDropdownButton', 'lokasiDropdownMenu');

            // Function to adjust dropdown width
            function adjustDropdownWidth(buttonId, menuId) {
                var dropdownButton = document.getElementById(buttonId);
                var dropdownMenu = document.getElementById(menuId);

                function setDropdownWidth() {
                    dropdownMenu.style.width = dropdownButton.offsetWidth + 'px';
                }

                setDropdownWidth();

                // Adjust the width whenever the window is resized
                window.addEventListener('resize', setDropdownWidth);
            }

            function setDropdownValue(buttonId, value) {
                document.getElementById(buttonId).querySelector('span:first-child').innerText = value;
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            adjustDropdownWidth('ruasDropdownButton', 'ruasDropdownMenu');
            adjustDropdownWidth('cctvDropdownButton', 'cctvDropdownMenu');

            // Function to adjust dropdown width
            function adjustDropdownWidth(buttonId, menuId) {
                var dropdownButton = document.getElementById(buttonId);
                var dropdownMenu = document.getElementById(menuId);

                function setDropdownWidth() {
                    dropdownMenu.style.width = dropdownButton.offsetWidth + 'px';
                }

                setDropdownWidth();

                // Adjust the width whenever the window is resized
                window.addEventListener('resize', setDropdownWidth);
            }

            function setDropdownValue(buttonId, value) {
                document.getElementById(buttonId).querySelector('span:first-child').innerText = value;
            }
        });
    </script>

    {{-- View CCTV --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var images = document.querySelectorAll('.cctv img');
            var modalImage = document.getElementById('modalImage');
    
            images.forEach(function (image) {
                image.addEventListener('click', function () {
                    modalImage.src = this.src;
                    modalImage.alt = this.alt;
                    $('#viewCCTV').modal('show');
                    $('#viewCCTV').addClass('show');
                    $('.modal-dialog').addClass('modal-fullscreen');
                });
            });
        });
    </script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Moment.js -->
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <!-- Date Range Picker JS -->
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inisialisasi Date Range Picker
            $('#dateRangePicker').daterangepicker({
                locale: {
                    format: 'YYYY-MM-DD'
                },
                opens: 'right',
                alwaysShowCalendars: true,
                autoUpdateInput: false,
                startDate: moment().startOf('month'),
                endDate: moment().endOf('month'),
                ranges: {
                    'Sekarang': [moment(), moment()],
                    'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    '7 Hari Terakhir': [moment().subtract(6, 'days'), moment()],
                    '30 Hari Terakhir': [moment().subtract(29, 'days'), moment()],
                    'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
                    'Bulan Lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            });

            // Fungsi tombol Apply
            $("#applyDateButton").on("click", function() {
                var selectedDates = $('#dateRangePicker').data('daterangepicker');
                var startDate = selectedDates.startDate.format('YYYY-MM-DD');
                var endDate = selectedDates.endDate.format('YYYY-MM-DD');
                $("#dateDropdownButton").text(startDate + " to " + endDate);
                // Tutup dropdown
                $(".dropdown-toggle").dropdown("toggle");
            });

            // Fungsi tombol Cancel
            $("#cancelDateButton").on("click", function() {
                // Tutup dropdown
                $(".dropdown-toggle").dropdown("toggle");
            });
        });
    </script>

    @include('includes.script')

</body>
</html>