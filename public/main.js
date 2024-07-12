// Password Eye Icon
function togglePasswordVisibility() {
    var passwordInput = document.getElementById('password');
    var icon = document.querySelector('.password-toggle i');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

// Scroll to top button
document.addEventListener('DOMContentLoaded', function() {
    var scrollButton = document.querySelector('.scroll-to-top');

    // Fungsi untuk memeriksa posisi scroll dan mengatur visibilitas tombol
    function checkScrollPosition() {
        if (window.scrollY > 100) {
            scrollButton.style.display = 'block';
        } else {
            scrollButton.style.display = 'none';
        }
    }

    // Panggil fungsi saat dokumen dimuat dan saat pengguna melakukan scroll
    document.addEventListener('scroll', checkScrollPosition);
    checkScrollPosition(); // Panggil satu kali untuk memastikan status awal

    // Animasi smooth scroll ke atas saat tombol di-klik
    scrollButton.addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});

// Edit User Modal
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

// Layout CCTV
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

// Dropdown Menu
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

// View CCTV
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

// Dashboard Datepicker
$(document).ready(function() {
    // Initialize date range picker
    $('#datePickerChart').daterangepicker({
        opens: 'center',
        showDropdowns: true,
        timePicker: false, // Tidak menampilkan time picker
        locale: {
            format: 'D MMMM YYYY', // Format untuk menampilkan tanggal (2 Juni 2024)
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
        // Callback apply, disini kita set nilai untuk menampilkan rentang tanggal
        $('#datePickerChart').val(start.format('D MMMM YYYY') + ' - ' + end.format('D MMMM YYYY'));
    });

    // Event listener untuk ikon filter
    $('#filterIcon').click(function(e) {
        e.preventDefault();
        $('#datePickerChart').click(); // Klik input date picker
    });

    // Set initial value, default menampilkan rentang bulan ini
    $('#datePickerChart').val(moment().startOf('month').format('D MMMM YYYY') + ' - ' + moment().endOf('month').format('D MMMM YYYY'));
});

// Events Datepicker
$(document).ready(function() {
    // Initialize date range picker
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
            'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            '7 Hari Terakhir': [moment().subtract(6, 'days'), moment()],
            '30 Hari Terakhir': [moment().subtract(29, 'days'), moment()],
            'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
            'Bulan Lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
    }, function(start, end, label) {
        $('#datePickerInput').val(start.format('YYYY-MM-DD HH:mm:ss') + ' - ' + end.format('YYYY-MM-DD HH:mm:ss'));
    });

    // Set initial value
    $('#datePickerInput').val(moment().subtract(29, 'days').format('YYYY-MM-DD HH:mm:ss') + ' - ' + moment().format('YYYY-MM-DD HH:mm:ss'));
});

