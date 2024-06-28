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




