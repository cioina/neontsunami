<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * GET /posts
     * Get a listing of all posts.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $posts = Post::with('tags', 'series')
            ->published()
            ->latest()
            ->paginate(10);

        $page = $request->get('page');
        $title = $page ? "All posts (Page {$page})" : 'All posts';

        return view('posts.index', compact('posts'))
            ->withTitle($title);
    }

    /**
     * GET /posts/post-slug
     * Get a single post.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\View\View
     */
    public function show(Post $post)
    {
        abort_unless($post->isPublished(), 404);

        $post->load('series', 'tags', 'user');

        $post->increment('views');

        return view('posts.show', compact('post'))
            ->withTitle($post->title)
            ->withDescription(str_limit($post->content, 160));
    }
}
