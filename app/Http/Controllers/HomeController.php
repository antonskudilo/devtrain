<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use App\BlogPost;
use App\BlogTag;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\BaseTag;

class HomeController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {
        $posts = BlogPost::paginate(5);
        return view('blog.index', [
            'posts' => $posts,
        ]);
    }

    public function show($slug)
    {
        $post = BlogPost::where('slug', $slug)->firstOrFail();

//        dd($post->comments);

        return view('blog.show', [
            'post' => $post,
        ]);
    }

    public function tag($slug)
    {
        $tag = BlogTag::where('slug', $slug)->firstOrFail();
//        $posts = $tag->posts()->where('status', 1)->paginate(6);
        $posts = $tag->posts()->paginate(12);

        return view('blog.list', [
            'posts' => $posts,
        ]);
    }

    public function category($slug)
    {
        $category = BlogCategory::where('slug', $slug)->firstOrFail();
//        $posts = $category->posts()->where('status', 1)->paginate(6);
        $posts = $category->posts()->paginate(12);

        return view('blog.list', [
            'posts' => $posts,
        ]);
    }

    public function apiPosts()
    {
        return BlogPost::all();
    }
}
