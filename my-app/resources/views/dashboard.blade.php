<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <script>
        function showPostForm() {
            document.getElementById('postForm').style.display = 'block';
        }
    </script>
</head>
<body>
    <h1>Welcome to the Dashboard</h1>
    <div class="posts">
        <h2>Posts</h2>
            <ul>
                @foreach ($posts as $post)
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->content }}</p>
                    <p>Posted on: {{ $post->created_at }}</p>
                @endforeach
            </ul>
        </div>
        <button class="btn btn-primary" onclick="showPostForm()">Create a new post</button>
        <form id="postForm" method="POST" action="/posts" style="display:none; margin-top:20px;">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <div>
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" required>
            </div>
            <div>
                <label for="content">Content:</label>
                <textarea name="content" id="content" required></textarea>
            </div>
            <button type="submit">Publish</button>
        </form>
    </div>
</body>
</html>
