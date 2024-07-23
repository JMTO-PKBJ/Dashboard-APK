
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
                // window.location.href = '/dashboard'; // Adjust path as needed
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
                // alert('Logout successful');
                window.location.href = '/login';
                // location.reload(); // Refresh the page after logout
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