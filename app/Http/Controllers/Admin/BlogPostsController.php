<?php

namespace App\Http\Controllers\Admin;

use App\BlogCategory;
use App\BlogPost;
use App\BlogTag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogPostsController extends Controller
{

    public function index()
    {
        $posts = BlogPost::all();
        return view('admin.blog_posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        $tags = BlogTag::pluck('title', 'id')->all();
        $categories = BlogCategory::pluck('title', 'id')->all();

        return view('admin.blog_posts.create', [
            'tags' => $tags,
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'content' => 'required',
            'avatar' => 'nullable|image'
        ]);

        $post = BlogPost::add($request->all());
        $post->uploadImage($request->file('image'));
        $post->setCategory($request->get('blog_category_id'));
        $post->setTags($request->get('tags'));
        $post->toggleStatus($request->get('status'));
        $post->toggleRecommended($request->get('is_recommended'));

        return redirect()->route('posts.index');
    }

    public function edit($id)
    {
        $post = BlogPost::find($id);
        $tags = BlogTag::pluck('title', 'id')->all();
        $selectedTags = $post->tags->pluck('id')->all();
        $categories = BlogCategory::pluck('title', 'id')->all();

        return view('admin.blog_posts.edit', [
            'post' => $post,
            'tags' => $tags,
            'selectedTags' => $selectedTags,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'content' => 'required',
            'avatar' => 'nullable|image'
        ]);

        $post = BlogPost::find($id);
        $post->edit($request->all());
        $post->uploadImage($request->file('image'));
        $post->setCategory($request->get('blog_category_id'));
        $post->setTags($request->get('tags'));
        $post->toggleStatus($request->get('status'));
        $post->toggleRecommended($request->get('is_recommended'));

        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        BlogPost::find($id)->remove();
        return redirect()->route('posts.index');
    }
}
