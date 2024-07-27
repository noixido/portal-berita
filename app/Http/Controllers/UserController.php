<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $users = User::query()
                ->orderBy('created_at', 'desc')
                ->where('name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                ->orWhere('role', 'LIKE', '%' . $request->search . '%')
                ->paginate(10)
                ->onEachSide(2);
        } else {
            $users = User::query()
                ->orderBy('created_at', 'desc')
                ->paginate(10)
                ->onEachSide(2);
        }
        Session::put('halaman_url', request()->fullUrl());
        return view('admin.pengguna.index', compact('users'));
    }

    public function create()
    {
        return view('admin.pengguna.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
            'role' => ['required'],
        ]);
        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'remember_token' => Str::random(60),
        ]);
        return redirect()->route('pengguna');
    }

    public function edit($id)
    {
        $users = User::query()
            ->where('id', $id)
            ->first();
        return view('admin.pengguna.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        if ($request->password == null) {
            $request->validate([
                'nama' => ['required', 'min:3'],
                'email' => ['required', 'email'],
                'role' => ['required'],
            ]);
            User::query()
                ->find($id)
                ->update([
                    'nama' => $request->name,
                    'email' => $request->email,
                    'role' => $request->role,
                ]);
        } else {
            $request->validate([
                'nama' => ['required', 'min:3'],
                'email' => ['required', 'email'],
                'password' => ['required', 'min:8'],
                'role' => ['required'],
            ]);
            User::query()
                ->find($id)
                ->update([
                    'nama' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'role' => $request->role,
                ]);
        }
        if (session('halaman_url')) {
            return redirect(session('halaman_url'));
        }
        return redirect()->route('pengguna');
    }

    public function destroy($id)
    {
        User::query()
            ->find($id)
            ->delete();
        if (session('halaman_url')) {
            return redirect(session('halaman_url'));
        }
        return back();
    }
}
