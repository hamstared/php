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
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
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
                    <li class="border border-gray-300 rounded-lg p-6 shadow-sm bg-gray-50">
                        <h3 class="text-xl font-bold mb-2 text-blue-800">{{ $post->title }}</h3>
                        <p class="mb-2">{{ $post->content }}</p>
                        <p class="text-sm text-gray-600 mb-2">By: {{ $post->user->name ?? 'Unknown' }}</p>
                        <p class="text-xs text-gray-400 mb-4">Posted on: {{ $post->created_at }}</p>
                        <div class="bg-gray-100 p-4 rounded mb-4">
                            <h4 class="font-semibold mb-2 text-blue-700">Comments:</h4>
                            <div class="space-y-2">
                                @foreach ($post->comments as $comment)
                                    <div class="border border-gray-200 rounded p-2 bg-white">
                                        <strong class="text-blue-600">{{ $comment->user->name ?? 'Unknown' }}:</strong>
                                        {{ $comment->content }}
                                        <br>
                                        <small class="text-xs text-gray-400">at {{ $comment->created_at }}</small>
                                    </div>
                                @endforeach
                            </div>
                            <form method="POST" action="/comments" class="mt-4 space-y-2">
                                @csrf
                                <input type="hidden" name="user_post_id" value="{{ $post->id }}">
                                <textarea name="content" required class="w-full px-3 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-300" placeholder="Add a comment..."></textarea>
                                <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded hover:bg-blue-700 transition">Add Comment</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>
