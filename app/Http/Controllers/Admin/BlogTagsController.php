<?php

namespace App\Http\Controllers\Admin;

use App\BlogTag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogTagsController extends Controller
{
    public function index()
    {
        $tags = BlogTag::all();

        return view('admin.blog_tags.index', [
            'tags'  => $tags,
        ]);
    }

    public function create()
    {
        return view('admin.blog_tags.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:blog_tags|min:3'
        ]);
        BlogTag::create($request->all());
        return redirect()->route('tags.index');
    }

    public function edit($id)
    {
        $tag = BlogTag::find($id);
        return view('admin.blog_tags.edit', [
            'tag'  => $tag,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|unique:blog_tags|min:3'
        ]);

        $tag = BlogTag::find($id);
        $tag->update($request->all());
        return redirect()->route('tags.index');
    }

    public function destroy($id)
    {
        BlogTag::find($id)->delete();
        return redirect()->route('tags.index');
    }
}
