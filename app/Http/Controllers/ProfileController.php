<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('blog.profile', [
            "user" => $user
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'name' => 'required|min:3',
            'password' => 'required|min:6',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::user()->id),
            ],
            'avatar' => 'nullable|image'
        ]);

        $user->edit($request->all());
        $user->uploadAvatar($request->file('avatar'));

        return redirect()->back()->with('status', 'Профиль был успешно изменен');
    }
}
