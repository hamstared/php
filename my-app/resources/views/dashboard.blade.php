<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <script>
        function showPostForm() {
            document.getElementById('postForm').style.display = 'block';
        }
    </script>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body>
    <h1 class="page-title">Welcome to the Dashboard</h1>
    <div class="posts-row">
        <h2 class="section-title">Posts</h2>
            <ul>
                @foreach ($posts as $post)
                    <div class="post-item">
                        <h3>{{ $post->title }}</h3>
                        <p>{{ $post->content }}</p>
                        <p>By: {{ $post->user->name ?? 'Unknown' }}</p>
                        <p>Posted on: {{ $post->created_at }}</p>
                    </div>
                @endforeach
            </ul>
        </div>
        <button class="btn btn-primary" onclick="showPostForm()">Create a new post</button>
        <form id="postForm" method="POST" action="/posts" style="display:none; margin-top:20px;">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <div>
                <label class="form-label" for="title">Title:</label>
                <input type="text" name="title" id="title" required>
            </div>
            <div>
                <label class="form-label" for="content">Content:</label>
                <textarea name="content" id="content" required></textarea>
            </div>
            <button type="submit">Publish</button>
        </form>
    </div>
</body>
</html>
