<?php

namespace App\Http\Controllers\Admin;

use App\BlogSubscription;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscribersController extends Controller
{
    public function index()
    {
        $subscribers = BlogSubscription::all();
        return view('admin.blog_subscribers.index', [
            'subscribers' => $subscribers,
        ]);
    }

    public function create()
    {
        return view('admin.blog_subscribers.create');
    }



    public function destroy($id)
    {
        BlogSubscription::find($id)->remove();
        return redirect()->route('subscribers.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:blog_subscriptions'
        ]);

        BlogSubscription::add($request->get('email'));

        return redirect()->route('subscribers.index');
    }
}
