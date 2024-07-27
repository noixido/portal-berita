<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KategoriController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $kategoris = Kategori::query()
                ->orderBy('created_at', 'desc')
                ->where('nama_kategori', 'LIKE', '%' . $request->search . '%')
                ->paginate(10)
                ->onEachSide(2);
        } else {
            $kategoris = Kategori::query()
                ->orderBy('created_at', 'desc')
                ->paginate(10)
                ->onEachSide(2);
        }
        Session::put('halaman_url', request()->fullUrl());
        return view('admin.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => ['required', 'min:3'],
        ]);
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect()->route('kategori');
    }

    public function edit($id)
    {
        $kategoris = Kategori::query()
            ->where('id', $id)
            ->first();
        return view('admin.kategori.edit', compact('kategoris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => ['required', 'min:3'],
        ]);
        Kategori::query()
            ->find($id)
            ->update([
                'nama_kategori' => $request->nama_kategori,
            ]);
        if (session('halaman_url')) {
            return redirect(session('halaman_url'));
        }
        return redirect()->route('kategori');
    }

    public function destroy($id)
    {
        Kategori::query()
            ->find($id)
            ->delete();
        if (session('halaman_url')) {
            return redirect(session('halaman_url'));
        }
        return back();
    }
}
