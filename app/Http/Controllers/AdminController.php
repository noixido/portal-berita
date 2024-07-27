<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        $usersCount = User::query()
            ->count();
        $kategorisCount = Kategori::query()
            ->count();
        $beritaCount = Berita::query()
            ->where('status_publish', 'publish')
            ->count();
        return view('admin.index', compact('usersCount', 'kategorisCount', 'beritaCount'));
    }
}
