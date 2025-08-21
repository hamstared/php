<li class="border border-gray-300 rounded-lg p-6 shadow-sm bg-gray-50">
    <h3 class="text-xl font-bold mb-2 text-blue-800">{{ $post->title }}</h3>
    <p class="mb-2 text-black">{{ $post->content }}</p>
    <p class="text-sm text-gray-600 mb-2">By: {{ $post->user->name ?? 'Unknown' }}</p>
    <p class="text-xs text-gray-400 mb-4">Posted on: {{ $post->created_at }}</p>
    <div class="bg-gray-100 p-4 rounded mb-4">
        <h4 class="font-semibold mb-2 text-blue-700">Comments:</h4>
        <div class="space-y-2">
            @foreach ($post->comments as $comment)
                <div class="border border-gray-200 rounded p-2 bg-white">
                    <strong class="text-blue-600">{{ $comment->user->name ?? 'Unknown' }}:</strong>
                    <span class='text-black'>{{ $comment->content }}</span>
                    <br>
                    <small class="text-xs text-gray-400">at {{ $comment->created_at }}</small>
                </div>
            @endforeach
        </div>
        <form method="POST" action="/comments" class="mt-4 space-y-2">
            @csrf
            <input type="hidden" name="user_post_id" value="{{ $post->id }}">
            <textarea name="content" required class="w-full px-3 py-2 rounded border bg-white border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-300" placeholder="Add a comment..."></textarea>
            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded hover:bg-blue-700 transition">Add Comment</button>
        </form>
    </div>
</li>
