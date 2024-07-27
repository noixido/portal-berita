@extends('layouts.admin-section.master')
@section('title', 'Lihat Berita')
@section('nav-title', 'Lihat Berita')
@section('content')
    <div class="p-6 flex flex-col gap-2">
        <div class="mx-auto w-full p-6">
            <h1 class="font-bold text-center text-5xl mb-5">{{ $beritas->judul }}</h1>
            <h3 class="font-semibold text-center text-sm mb-5">
                {{ $beritas->kategori->nama_kategori }}
                -
                {{ date('j F Y, H:i', strtotime($beritas->created_at)) }} WIB
            </h3>
            @if ($beritas->thumbnail)
                <img src="{{ asset('storage/' . $beritas->thumbnail) }}" alt="{{ $beritas->judul }}"
                    class="mx-auto object-cover w-2/4">
            @else
                <img src="/images/banner.jpg" alt="{{ $beritas->judul }}" class="mx-auto object-cover w-2/4">
            @endif

            <p class="font-normal text-justify text-md mt-10 whitespace-pre-wrap">{{ $beritas->deskripsi }}</p>
        </div>
        <div class="w-full p-6">
            <a href="{{ route('edit-berita', $beritas->id) }}" class="rounded p-2 bg-yellow-300 text-sm text-black">Edit
                Berita</a>
        </div>
    </div>
@endsection
