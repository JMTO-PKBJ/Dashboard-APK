<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        #fetchDataButton {
            display: none;
        }
        #loginForm {
            display: block;
        }
    </style>
    <script>
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
    </script>
</head>
<body>
    <h1>Login</h1>
    <form id="loginForm" onsubmit="event.preventDefault(); login();">
        <input type="text" id="username" placeholder="Username" required>
        <input type="password" id="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <button id="fetchDataButton" onclick="fetchData()">Fetch Data</button>
    <button onclick="logout()">Logout</button>
</body>
</html>
