// Scroll to top button
document.addEventListener('DOMContentLoaded', function() {
    var scrollButton = document.querySelector('.scroll-to-top');

    function checkScrollPosition() {
        if (window.scrollY > 100) {
            scrollButton.style.display = 'block';
        } else {
            scrollButton.style.display = 'none';
        }
    }

    document.addEventListener('scroll', checkScrollPosition);
    checkScrollPosition(); 

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

// Dropdown Menu
document.addEventListener('DOMContentLoaded', function () {
    adjustDropdownWidth('ruasDropdownButton', 'ruasDropdownMenu');
    adjustDropdownWidth('lokasiDropdownButton', 'lokasiDropdownMenu');

    function adjustDropdownWidth(buttonId, menuId) {
        var dropdownButton = document.getElementById(buttonId);
        var dropdownMenu = document.getElementById(menuId);

        function setDropdownWidth() {
            dropdownMenu.style.width = dropdownButton.offsetWidth + 'px';
        }

        setDropdownWidth();

        window.addEventListener('resize', setDropdownWidth);
    }

    function setDropdownValue(buttonId, value) {
        document.getElementById(buttonId).querySelector('span:first-child').innerText = value;
    }
});

document.addEventListener('DOMContentLoaded', function () {
    adjustDropdownWidth('ruasDropdownButton', 'ruasDropdownMenu');
    adjustDropdownWidth('cctvDropdownButton', 'cctvDropdownMenu');

    function adjustDropdownWidth(buttonId, menuId) {
        var dropdownButton = document.getElementById(buttonId);
        var dropdownMenu = document.getElementById(menuId);

        function setDropdownWidth() {
            dropdownMenu.style.width = dropdownButton.offsetWidth + 'px';
        }

        setDropdownWidth();

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

function setRole(role) {
    document.getElementById('roleDropdownButton').textContent = role;
}

function setDropdownValue(dropdownId, value) {
    document.getElementById(dropdownId).textContent = value;
}


