<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    @if ($errors->any())
        <div>{{ $errors->first() }}</div>
    @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
