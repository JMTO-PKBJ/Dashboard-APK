// document.addEventListener("DOMContentLoaded", () => {
//     const token = localStorage.getItem('token');
//     if (token) {
//         document.getElementById('loginForm').style.display = 'none';
//     }
// });

// async function login() {
//     const username = document.getElementById('username').value;
//     const password = document.getElementById('password').value;

//     try {
//         const response = await fetch('/login', {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/json',
//                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//             },
//             body: JSON.stringify({ username, password })
//         });

//         const contentType = response.headers.get("content-type");
//         if (!contentType || !contentType.includes("application/json")) {
//             const text = await response.text();
//             throw new Error(`Expected JSON, got ${text}`);
//         }

//         const data = await response.json();

//         if (data.success) {
//             localStorage.setItem('token', data.token);
//             location.href = "/home"; // Redirect to homepage after login
//         } else {
//             alert('Login failed');
//         }
//     } catch (error) {
//         console.error('Error during login:', error);
//         alert('Login failed due to an error.');
//     }
// }

// function togglePasswordVisibility() {
//     const passwordInput = document.getElementById('password');
//     const passwordToggle = document.querySelector('.password-toggle i');
//     if (passwordInput.type === 'password') {
//         passwordInput.type = 'text';
//         passwordToggle.classList.remove('fa-eye');
//         passwordToggle.classList.add('fa-eye-slash');
//     } else {
//         passwordInput.type = 'password';
//         passwordToggle.classList.remove('fa-eye-slash');
//         passwordToggle.classList.add('fa-eye');
//     }
// }


// async function logout() {
//     const token = localStorage.getItem('token');

//     const response = await fetch('/logout', {
//         method: 'POST',
//         headers: {
//             'Authorization': `Bearer ${token}`,
//             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//         }
//     });

//     if (response.ok) {
//         localStorage.removeItem('token');
//         alert('Logout successful');
//         location.href = "/login"; // Redirect to login page after logout
//     } else {
//         alert('Logout failed');
//     }
// }

        document.addEventListener("DOMContentLoaded", () => {
            const token = localStorage.getItem('token');
            if (token) {
                document.getElementById('loginForm').style.display = 'none';
                document.getElementById('fetchDataButton').style.display = 'block';
            }
        });

        async function login() {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            const response = await fetch('api/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ username, password })
            });

            const data = await response.json();

            if (data.remember_token) {
                localStorage.setItem('token', data.remember_token);
                alert('Login successful');
                
                // Redirect to home.blade.php
                window.location.href = '/dashboard'; // Adjust path as needed
                
                // Optionally, you can manage visibility of elements here
                // if (data.user.role === 'Admin') {
                //     document.getElementById('fetchDataButton').style.display = 'block';
                // }
            } else {
                alert('Login failed');
            }
        }

        async function fetchData() {
            const token = localStorage.getItem('token');

            const response = await fetch('api/users', {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            });

            const data = await response.json();
            console.log(data);
        }

        async function logout() {
            const token = localStorage.getItem('token');

            const response = await fetch('api/logout', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            });

            if (response.ok) {
                localStorage.removeItem('token');
                alert('Logout successful');
                location.reload(); // Refresh the page after logout
            } else {
                alert('Logout failed');
            }
        }

        function refreshToken() {
            const token = localStorage.getItem('token');
            
            fetch('api/refresh', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.remember_token) {
                    localStorage.setItem('token', data.remember_token);
                }
            });
        }

        setInterval(refreshToken, 15 * 60 * 1000); // Refresh token every 15 minutes