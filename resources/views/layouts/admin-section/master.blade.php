<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Portal Berita | @yield('title')</title>

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

<body class="text-gray-800">
    <!-- SIDEBAR -->
    @include('layouts.admin-section.sidebar')
    <!-- END OF SIDEBAR -->

    <!-- MAIN CONTENT -->
    <main class="w-[calc(100%-256px)] ml-64">
        <!-- NAVBAR -->
        @include('layouts.admin-section.navbar')
        <!-- END OF NAVBAR -->

        <!-- MAIN SECTION -->
        @yield('content')
        <!-- END OF MAIN SECTION -->
    </main>
    <!-- END OF MAIN CONTENT -->

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>

</html>
