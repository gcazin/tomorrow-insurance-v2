<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->middleware('auth');
        $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post::all();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function show($id)
    {
        $post = Post::all()->find($id);
        return view('post.show', compact('post'));
    }

    public function store(Request $request)
    {
        $post = $this->post;
        $post->content = $request->get('content');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect(route('home'));
    }

    public function like($id)
    {
        $post = Post::find($id);
        auth()->user()->toggleLike($post);

        return redirect()->back();
    }
}
