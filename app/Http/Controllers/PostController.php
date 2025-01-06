<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function home()
    {
        $posts = Post::with('user')->paginate(10);
        // dd($posts);
        return view('post.all_post', compact('posts'));
    }
    public function create()
    {
        return view('post.create');
    }
    public function doCreate(Request $request)
    {
        dd($request->all());
        $filename = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = date('Ymdhsi') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('posts', $filename, 'public');
        }
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
            'user_id' => auth()->check() ? auth()->user()->id : null,
            'image' => $filename,
        ]);
        // dd($post);
        return to_route('home.page')->with('success', 'Post created successfully');
    }

    public function postDetails($id)
    {
        // dd($id);
        $post_details = Post::with(['user', 'comments.user'])->find($id);
        // dd($post_details);
        return view('post.post_details', compact('post_details'));
    }

    public function comment(Request $request, $id)
    {
        // dd($id);
        if (!auth()->check()) {
            return redirect()->back()->with('error', 'You must be logged in to comment.');
        }
        $comment = Comment::create([
            'comment' => $request->comment,
            'post_id' => $id,
            'user_id' => $request->user()->id,
        ]);
        return back()->with('success', 'Comment added successfully');
    }
}
