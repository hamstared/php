<?php
namespace App\Http\Controllers;

use App\Models\userPosts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashController extends Controller
{
    public function index()
    {
        $posts = userPosts::select('title', 'content', 'created_at')->orderBy('created_at', 'desc')->get();
        return view('dashboard', compact('posts'));
    }

    public function storePost(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        userPosts::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Post created successfully!');
    }
}
