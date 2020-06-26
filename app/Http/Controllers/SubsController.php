<?php

namespace App\Http\Controllers;

use App\BlogSubscription;
use App\Mail\SubscribeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubsController extends Controller
{
    public function subscribe(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:blog_subscriptions'
        ]);

        $subscriber = BlogSubscription::add($request->get('email'));
        $subscriber->generateToken();

        Mail::to($subscriber)->send(new SubscribeEmail($subscriber));

        return redirect()->back()->with('status', 'Проверьте вашу почту!');
    }

    public function verify($token)
    {
        $subscriber = BlogSubscription::where('token', $token)->firstOrFail();
        $subscriber->token = null;
        $subscriber->save();
        return redirect('/')->with('status', 'Почта подтверждена!');
    }
}
