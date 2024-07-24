<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #0C2754; position: fixed; top: 0; left: 0; height:100%; overflow-y: auto;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center my-3" href="{{ url('dashboard') }}">
        <img style="width: 50%" src="{{ asset('images/jasamarga_icon.png') }}" alt="">
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z"/>
            </svg>
            <span class="mx-2">Dashboard</span>
        </a>
        
        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Interface
        </div>
        <a class="nav-link collapsed sideCCTV" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-video" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1z"/>
            </svg>
            <span class="mx-2">CCTV</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 aboutCCTV collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.cctv') }}">Lihat CCTV</a>
                <a class="collapse-item" href="{{ route('admin.cctv.create') }}">Tambah CCTV</a>
            </div>
        </div>
        <a class="nav-link" href="{{ route('admin.events') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
            </svg>
            <span class="mx-2">Events</span>
        </a>
        <a class="nav-link" href="{{ route('admin.users') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
            </svg>
            <span class="mx-2">Users</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
</ul>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const collapseItems = document.querySelectorAll('.collapse-item');
    collapseItems.forEach(item => {
        item.addEventListener('click', function (event) {
            event.preventDefault(); 

            collapseItems.forEach(otherItem => {
                otherItem.classList.remove('active');
            });

            this.classList.add('active');

            const sideCCTV = document.querySelector('.sideCCTV');
            if (sideCCTV) {
                sideCCTV.classList.add('active');
                sideCCTV.style.fontWeight = 'bold';
            }

            const href = this.getAttribute('href');
            if (href && href !== '#') {
                window.location.href = href;
            }
        });
    });

    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault(); 

            navLinks.forEach(otherLink => {
                otherLink.classList.remove('active');
                otherLink.style.fontWeight = 'normal'; 
            });

            this.classList.add('active');
            this.style.fontWeight = 'bold'; 

            const href = this.getAttribute('href');
            if (href && href !== '#') {
                window.location.href = href;
            }
        });

        const url = window.location.href;
        if (link.href === url) {
            link.classList.add('active');
            link.style.fontWeight = 'bold';
        }
    });

    const activeCollapseLink = document.querySelector(`.collapse-item[href='${url}']`);
    if (activeCollapseLink) {
        activeCollapseLink.classList.add('active');

        const sideCCTV = document.querySelector('.sideCCTV');
        if (sideCCTV) {
            sideCCTV.classList.add('active');
            sideCCTV.style.fontWeight = 'bold';
        }
    }
    });
</script>