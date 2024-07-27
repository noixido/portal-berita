<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    //
    public function index()
    {
        return view('registrasi');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);

        // dd($request->all());
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'pengguna',
            'remember_token' => Str::random(60),
        ]);
        return redirect()->route('login');
    }
}
