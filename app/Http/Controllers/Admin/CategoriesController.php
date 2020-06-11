<?php

namespace App\Http\Controllers\Admin;

use App\BlogCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
//index
//create
//update
//edit
//store
//destroy

    public function index()
    {
        $categories = BlogCategory::all();

        return view('admin.blog_categories.index', [
            'categories'  => $categories,
        ]);
    }

    public function create()
    {
        return view('admin.blog_categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:blog_categories|min:3'
        ]);
        BlogCategory::create($request->all());
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = BlogCategory::find($id);
        return view('admin.blog_categories.edit', [
            'category'  => $category,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|unique:blog_categories|min:3'
        ]);

        $category = BlogCategory::find($id);
        $category->update($request->all());
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        BlogCategory::find($id)->delete();
        return redirect()->route('categories.index');
    }
}
