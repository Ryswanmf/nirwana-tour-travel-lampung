<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        $posts = Post::where('is_published', true)
            ->latest('published_at')
            ->paginate(6);

        return view('pages.posts.index', compact('posts'));
    }

    public function show(string $slug): View
    {
        $post = Post::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $recentPosts = Post::where('is_published', true)
            ->where('id', '!=', $post->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('pages.posts.show', compact('post', 'recentPosts'));
    }
}
