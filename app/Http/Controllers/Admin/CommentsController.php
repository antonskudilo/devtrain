<?php

namespace App\Http\Controllers\admin;

use App\BlogComment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = BlogComment::all();
        return view('admin.blog_comments.index', [
            'comments' => $comments,
        ]);
    }

    public function toggle($id)
    {
        $comment = BlogComment::find($id);
        $comment->toggleStatus();
        $comment->save();
        return redirect()->route('comments');
    }

    public function destroy($id)
    {
        BlogComment::find($id)->delete();
        return redirect()->route('comments');
    }
}
