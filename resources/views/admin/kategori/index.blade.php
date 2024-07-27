@extends('layouts.admin-section.master')
@section('title', 'Daftar Kategori')
@section('nav-title', 'Daftar Kategori')
@section('content')
    <div class="p-6">
        <div class="relative overflow-x-auto sm:rounded-lg">
            <div
                class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
                <div>
                    <a href="{{ route('tambah-kategori') }}"
                        class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                        type="button">
                        Tambah Kategori
                    </a>
                </div>
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <form action="{{ route('kategori') }}" method="GET">
                        @csrf
                        <input type="text" name="search"
                            class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Cari kategori...">
                    </form>
                </div>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            No
                        </th>
                        <th scope="col" class="p-4">
                            Nama Kategori
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategoris as $index => $item)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                {{ $kategoris->firstItem() + $index }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->nama_kategori }}
                            </td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ route('edit-kategori', $item->id) }}"
                                    class="rounded bg-yellow-300 p-2 text-black hover:bg-yellow-400 hover:text-slate-100">edit</a>
                                <a href="{{ route('hapus-kategori', $item->id) }}"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"
                                    class="rounded bg-red-500 p-2 text-white hover:bg-red-400 hover:text-slate-100">hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $kategoris->links() }}
    </div>
@endsection
