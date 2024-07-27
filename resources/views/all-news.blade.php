<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Portal Berita</title>

    <!-- Favicon --->
    <link rel="icon" href="{{ url('/images/favicon.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>

    @vite('resources/css/app.css')
</head>

<body>

    <!-- NAV BAR -->
    <div class="sticky top-0 z-50">
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
                <a href="{{ route('welcome') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="/images/logo.png" class="h-8" alt="Portal Berita Logo">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Portal
                        Berita</span>
                </a>
                <div class="flex items-center space-x-6 rtl:space-x-reverse">
                    <a href="{{ route('semua-berita') }}" type="button"
                        class="text-black hover:text-gray-700 border border-black hover:border-gray-700 hover:bg-slate-100 font-medium rounded-lg text-sm px-5 py-1 text-center me-2 mt-1">Cari
                        Berita</a>
                    @auth
                        <form action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" onclick="return confirm('Apakah anda yakin ingin keluar?')"
                                class="text-sm  text-blue-600 dark:text-blue-500 hover:underline">Logout</button>
                        </form>
                    @endauth
                    @guest
                        <a href="{{ route('login') }}"
                            class="text-sm  text-blue-600 dark:text-blue-500 hover:underline">Login</a>
                    @endguest
                </div>
            </div>
        </nav>
        <nav class="bg-gray-50 dark:bg-gray-700">
            <div class="max-w-screen-xl px-4 py-3 mx-auto">
                <div class="flex items-center">
                    <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                        <li>
                            <a href="{{ route('welcome') }}" class="text-gray-900 dark:text-white hover:underline"
                                aria-current="page">Beranda</a>
                        </li>
                        @foreach ($nav as $item)
                            <li>
                                <a href="{{ route('berita-per-kategori', $item->id) }}"
                                    class="text-gray-900 dark:text-white hover:underline">{{ $item->nama_kategori }}</a>
                            </li>
                        @endforeach
                        <li>
                            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                                class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Kategori
                                Selengkapnya
                                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbar"
                                class="z-50 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                    aria-labelledby="dropdownLargeButton">
                                    @foreach ($nav2 as $item)
                                        <li>
                                            <a href="{{ route('berita-per-kategori', $item->id) }}"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $item->nama_kategori }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- END OF NAV BAR -->

    <div class="container w-5/6 block mx-auto py-5 gap-4">
        <form action="{{ route('semua-berita') }}" method="GET" class="w-full my-5">
            @csrf
            <input type="text" name="search" placeholder="cari berita di sini..."
                class="mx-auto w-5/12 block p-2 h-10 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </form>
        <div class="flex flex-wrap w-screen gap-2">
            @foreach ($beritas as $item)
                <div
                    class="w-64 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="{{ route('satu-berita', $item->slug) }}">
                        @if ($item->thumbnail)
                            <img class="rounded-t-lg" src="{{ asset('storage/' . $item->thumbnail) }}"
                                alt="{{ $item->judul }}" />
                        @else
                            <img class="rounded-t-lg" src="/images/banner.jpg" alt="{{ $item->judul }}" />
                        @endif

                    </a>
                    <div class="p-5">
                        <a href="{{ route('satu-berita', $item->slug) }}">
                            <h5
                                class="mb-2 text-md leading-5 font-bold tracking-tight text-black hover:text-blue-800 dark:text-white">
                                {{ $item->judul }}</h5>
                        </a>
                        <div class="block text-xs mt-3">
                            <a href="{{ route('berita-per-kategori', $item->kategori_id) }}"
                                class="text-blue-300 hover:text-blue-400">{{ $item->kategori->nama_kategori }}</a>
                            -
                            {{ date('j F Y, H:i', strtotime($item->created_at)) }} WIB
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{ $beritas->links() }}

    <!-- FOOTER -->
    <div class="block text-sm text-gray-500 sm:text-center dark:text-gray-400 mb-10 mt-20">
        <span>© 2024 - noixido. Project for
            Talenthub Bootcamp. All Rights Reserved.</span>
    </div>
    <!-- END OF FOOTER -->


    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>

</html>
