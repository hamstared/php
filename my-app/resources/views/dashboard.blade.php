<!DOCTYPE html>
<html lang="en">
<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <script>
        function showPostForm() {
            document.getElementById('postForm').style.display = 'block';
        }
    </script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-3xl mx-auto">
        @if ($errors->any())
            <x-alert :errors="$errors" />
        @endif

        <div class="text-3xl font-bold text-center mb-6 text-blue-700">Welcome to the Dashboard</div>

        <div class="bg-white p-8 rounded-lg shadow-md mb-8">
            <button class="w-full bg-blue-600 text-white font-bold py-2 rounded hover:bg-blue-700 transition mb-4" onclick="showPostForm()">Create a new post</button>
            <form id="postForm" method="POST" action="/posts" class="space-y-4" style="display:none;">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div>
                    <label class="block mb-1" for="title">Title:</label>
                    <input type="text" name="title" id="title" required class="w-full px-3 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-300">
                </div>
                <div>
                    <label class="block mb-1" for="content">Content:</label>
                    <textarea name="content" id="content" required class="w-full px-3 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-300"></textarea>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded hover:bg-blue-700 transition">Publish</button>
            </form>
        </div>

        <div class="bg-white p-8 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-6 text-blue-700">Posts</h2>
            <ul class="space-y-6">
                @foreach ($posts as $post)
                    <x-post-card :post="$post"/>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>
