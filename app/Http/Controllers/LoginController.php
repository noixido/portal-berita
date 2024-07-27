<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        if (Auth::attempt($request->only('email', 'password'))) {
            switch (Auth::user()->role) {
                case 'pengguna':
                    return redirect()->intended(route('welcome'));
                    break;
                case 'editor':
                    return redirect()->intended(route('admin'));
                    break;
                case 'admin':
                    return redirect()->intended(route('admin'));
                    break;
                default:
                    return redirect(route('welcome'))->with('login-error', 'gagal login!');
                    break;
            }
        }
        return redirect()->route('welcome')->with('login-error', 'gagal login!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
