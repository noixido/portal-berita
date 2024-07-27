@extends('layouts.admin-section.master')
@section('title', 'Edit Pengguna')
@section('nav-title', 'Edit Pengguna')
@section('content')
    <div class="p-6">
        <form action="{{ route('proses-edit-pengguna', $users->id) }}" method="POST" class="flex flex-wrap w-full gap-2">
            @csrf
            @method('put')
            <div class="mb-5 w-2/5">
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" name="nama" value="{{ old('nama', $users->name) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="John Doe" required />
            </div>
            <div class="mb-5 w-2/5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" name="email" value="{{ old('email', $users->email) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="name@flowbite.com" required />
            </div>
            <div class="mb-5 w-2/5">
                <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                <select name="role"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option disabled selected>pilih role</option>
                    <option value="pengguna" {{ 'pengguna' === old('role', $users->role) ? 'selected' : '' }}>Pengguna
                    </option>
                    <option value="editor" {{ 'editor' === old('role', $users->role) ? 'selected' : '' }}>Editor</option>
                    <option value="admin" {{ 'admin' === old('role', $users->role) ? 'selected' : '' }}>Admin</option>
                </select>
            </div>
            <div class="mb-5 w-2/5">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <input type="password" name="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="password" />
            </div>
            <div class="mb-5 w-2/5">
                <button type="submit"
                    class="text-white bg-yellow-300 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit
                    Pengguna</button>
            </div>
        </form>
    </div>
@endsection
