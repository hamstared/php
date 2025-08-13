<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login to your account</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>

<body>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="page-title">Welcome</div>
    <div class="container">
        <h1 class="login-title">Login</h1>
        <form method="POST" action="/login">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p class="form-group">Don't have an account? <a href="/register">Register here</a></p>
    </div>
</body>

</html>
