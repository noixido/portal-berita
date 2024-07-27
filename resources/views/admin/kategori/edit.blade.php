@extends('layouts.admin-section.master')
@section('title', 'Edit Kategori')
@section('nav-title', 'Edit Kategori')
@section('content')
    <div class="p-6">
        <form action="{{ route('proses-edit-kategori', $kategoris->id) }}" method="POST"
            class="flex flex-col flex-wrap w-full gap-2">
            @csrf
            @method('put')
            <div class="mb-5 w-2/5">
                <label for="nama_kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Kategori</label>
                <input type="text" name="nama_kategori" value="{{ old('nama_kategori', $kategoris->nama_kategori) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required />
            </div>
            <div class="mb-5 w-2/5">
                <button type="submit"
                    class="text-white bg-yellow-300 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit
                    Kategori</button>
            </div>
        </form>
    </div>
@endsection
