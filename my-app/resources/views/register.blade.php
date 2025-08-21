<!DOCTYPE html>
<html lang="en">
<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <h1 class="text-3xl font-bold mb-6 text-black">Register</h1>
        <form method="POST" action="/register" class="bg-white p-8 rounded-lg shadow-md">
            @csrf
            <div class="form-group">
                <label for="name" class="block mb-1 text-black">Name</label>
                <input type="text" id="name" name="name" required class="w-full px-3 py-2 rounded bg-white text-black border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-300">
            </div>
            <div class="form-group">
                <label for="email" class="block mb-1 text-black">Email</label>
                <input type="email" id="email" name="email" required class="w-full px-3 py-2 rounded bg-white text-black border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-300">
            </div>
            <div class="form-group">
                <label for="password" class="block mb-1 text-black">Password</label>
                <input type="password" id="password" name="password" required class="w-full px-3 py-2 rounded bg-white text-black border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-300">
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="block mb-1 text-black">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full px-3 py-2 rounded bg-white text-black border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-300 mb-4">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded hover:bg-blue-700 transition">Register</button>
        </form>
        <p class="mt-4 text-center text-black">Already have an account? <a href="/login" class="underline text-blue-600 hover:text-blue-800">Login here</a></p>
    </div>
</body>

</html>
