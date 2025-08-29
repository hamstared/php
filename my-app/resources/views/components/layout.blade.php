<!DOCTYPE html>
<html lang="en">
<head>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    {{ $slot }}
</body>
</html>
