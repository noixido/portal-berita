<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BeritaController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $beritas = Berita::query()
                ->with('kategori')
                ->orderBy('created_at', 'desc')
                ->where('judul', 'LIKE', '%' . $request->search . '%')
                ->orWhere('slug', 'LIKE', '%' . $request->search . '%')
                ->paginate(10)
                ->onEachSide(2);
        } else {
            $beritas = Berita::query()
                ->with('kategori')
                ->orderBy('created_at', 'desc')
                ->paginate(10)
                ->onEachSide(2);
        }
        Session::put('halaman_url', request()->fullUrl());
        return view('admin.berita.index', compact('beritas'));
    }

    public function show($id)
    {
        $beritas = Berita::query()
            ->where('id', $id)
            ->first();
        return view('admin.berita.show', compact('beritas'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.berita.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => ['required', 'min:3'],
            'slug' => ['required', 'min:3'],
            'deskripsi' => ['required', 'min:3'],
            'thumbnail' => ['required', 'image', 'mimes:jpg,jpeg', 'file', 'max:2048'],
            'kategori' => ['required'],
            'status_berita' => ['required'],
            'status_publish' => ['required'],
        ]);

        $thumbnailName = str_replace(" ", "-", $request->slug . "_" . "gambar-berita.jpg");

        Berita::create([
            'judul' => $request->judul,
            'slug' => $request->slug,
            'deskripsi' => $request->deskripsi,
            'thumbnail' => $request->file('thumbnail')->storeAs('news-images', $thumbnailName, 'public'),
            'kategori_id' => $request->kategori,
            'status_berita' => $request->status_berita,
            'status_publish' => $request->status_publish,
            'views' => 0,
        ]);
        return redirect()->route('berita');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Berita::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }

    public function edit($id)
    {
        $kategoris = Kategori::all();
        $beritas = Berita::query()
            ->where('id', $id)
            ->first();
        return view('admin.berita.edit', compact('kategoris', 'beritas'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => ['required', 'min:3'],
            'slug' => ['required', 'min:3'],
            'deskripsi' => ['required', 'min:3'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpg,jpeg', 'file', 'max:2048'],
            'kategori' => ['required'],
            'status_berita' => ['required'],
            'status_publish' => ['required'],
        ]);

        $thumbnailName = str_replace(" ", "-", $request->slug . "_" . "gambar-berita.jpg");

        if ($request->file('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->storeAs('news-images', $thumbnailName, 'public');
            Berita::find($id)->update(['thumbnail' => $validated['thumbnail'],]);
        }

        Berita::query()
            ->find($id)
            ->update([
                'judul' => $request->judul,
                'slug' => $request->slug,
                'deskripsi' => $request->deskripsi,
                'kategori_id' => $request->kategori,
                'status_berita' => $request->status_berita,
                'status_publish' => $request->status_publish,
            ]);

        if (session('halaman_url')) {
            return redirect(session('halaman_url'));
        }
        return redirect()->route('berita');
    }

    public function destroy($id)
    {
        $beritas = Berita::query()
            ->where('id', $id)
            ->first();

        if ($beritas->thumbnail) {
            unlink('storage/' . $beritas->thumbnail);
        }

        $beritas->delete();

        if (session('halaman_url')) {
            return redirect(session('halaman_url'));
        }
        return back();
    }
}
