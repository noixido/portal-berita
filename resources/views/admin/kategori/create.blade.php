@extends('layouts.admin-section.master')
@section('title', 'Tambah Kategori')
@section('nav-title', 'Tambah Kategori')
@section('content')
    <div class="p-6">
        <form action="{{ route('proses-tambah-kategori') }}" method="POST" class="flex flex-col flex-wrap w-full gap-2">
            @csrf
            <div class="mb-5 w-2/5">
                <label for="nama_kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Kategori</label>
                <input type="text" name="nama_kategori" value="{{ old('nama_kategori') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Kesehatan" required />
            </div>
            <div class="mb-5 w-2/5">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah
                    Kategori</button>
            </div>
        </form>
    </div>
@endsection
