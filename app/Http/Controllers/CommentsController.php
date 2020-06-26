<?php

namespace App\Http\Controllers;

use App\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required',
        ]);

        $comment = new BlogComment();
        $comment->text = $request->get('comment');
        $comment->blog_post_id = $request->get('post_id');
        $comment->user_id = Auth::user()->id;
        $comment->save();

        return redirect()->back()->with('status', 'Комментарий добавлен');
    }


}
