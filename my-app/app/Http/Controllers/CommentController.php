<?php
namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function show($postId)
    {
        $comments = Comment::where('user_post_id', $postId)->get();
        return view('comments.show', compact('comments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_post_id' => 'required|exists:user_posts,id',
            'content' => 'required|string|max:500',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'user_post_id' => $request->user_post_id,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
}
