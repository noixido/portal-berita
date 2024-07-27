@extends('layouts.admin-section.master')
@section('title', 'Tambah Berita')
@section('nav-title', 'Tambah Berita')
@section('content')
    <div class="p-6">
        <form action="{{ route('proses-tambah-berita') }}" method="POST" class="flex flex-wrap w-full gap-2"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-5 w-2/5">
                <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                    Berita</label>
                <input type="text" id="judul" name="judul" value="{{ old('judul') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Ini Judul Berita" required />
            </div>
            <div class="mb-5 w-2/5">
                <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                <input type="text" id="slug" name="slug"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    readonly />
            </div>
            <div class="mb-5 w-5/6">
                <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi
                    Berita</label>
                <textarea name="deskripsi" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Tuliskan deskripsi berita..." required></textarea>
            </div>
            <div class="mb-5 w-2/5">
                <label for="thumbnail"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Thumbnail</label>
                <input name="thumbnail"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="thumbnail" type="file" required onchange="previewImage()">
                <img class="rounded mt-2 mx-auto w-60" id="preview">
            </div>
            <div class="mb-5 w-2/5">
                <label for="Kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori
                    Berita</label>
                <select name="kategori"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                    <option disabled selected>Pilih Kategori</option>
                    @foreach ($kategoris as $item)
                        <option value="{{ $item->id }}" {{ $item->id === old('kategori') ? 'selected' : '' }}>
                            {{ $item->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5 w-2/5">
                <label for="status_berita" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                    Berita</label>
                <select name="status_berita"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                    <option disabled selected>Pilih Status Berita</option>
                    <option value="headline" {{ 'headline' === old('status_berita') ? 'selected' : '' }}>Headline</option>
                    <option value="regular" {{ 'regular' === old('status_berita') ? 'selected' : '' }}>Regular</option>
                </select>
            </div>
            <div class="mb-5 w-2/5">
                <label for="status_publish" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                    Publish</label>
                <select name="status_publish"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                    <option disabled selected>Pilih Status Publish</option>
                    <option value="publish" {{ 'publish' === old('status_publish') ? 'selected' : '' }}>Publish</option>
                    <option value="draft" {{ 'draft' === old('status_draft') ? 'selected' : '' }}>Draft</option>
                </select>
            </div>
            <div class="mb-5 w-2/5">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah
                    Berita</button>
            </div>
        </form>
    </div>

    <script>
        const judul = document.querySelector('#judul');
        const slug = document.querySelector('#slug');

        judul = addEventListener('change', function() {
            fetch('{{ route('checkSlug') }}?judul=' + judul.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        function previewImage() {
            const image = document.querySelector('#thumbnail');
            const preview = document.querySelector('#preview');

            preview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                preview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
