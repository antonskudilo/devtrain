<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('blog.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6',
        ]);

        User::add($request->all());

        return redirect('/login');
    }

    public function loginForm()
    {
        return view('blog.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ])) {
            return redirect('/');
        } else {
            return redirect()->back()->with('status', 'Неправильный логин или пароль');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
