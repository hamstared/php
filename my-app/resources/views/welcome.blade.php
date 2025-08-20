<!DOCTYPE html>
<html lang="en">
<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login to your account</title>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md mx-auto">
        @if (session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
        <div class="text-3xl font-bold text-center mb-6 text-blue-700">Welcome</div>
        <div class="bg-blue-500 text-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-semibold mb-4 text-center">Login</h1>
            <form method="POST" action="/login" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block mb-1">Email</label>
                    <input type="email" id="email" name="email" required class="w-full px-3 py-2 rounded text-black border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-300">
                </div>
                <div>
                    <label for="password" class="block mb-1">Password</label>
                    <input type="password" id="password" name="password" required class="w-full px-3 py-2 rounded text-black border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-300">
                </div>
                <button type="submit" class="w-full bg-white text-blue-600 font-bold py-2 rounded hover:bg-blue-100 transition">Login</button>
            </form>
            <p class="mt-4 text-center">Don't have an account? <a href="/register" class="underline text-white hover:text-blue-200">Register here</a></p>
        </div>
    </div>
</body>
</html>
