<!DOCTYPE html>
<<<<<<< HEAD
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Media Module - {{ config('app.name', 'Laravel') }}</title>

    <meta name="description" content="{{ $description ?? '' }}">
    <meta name="keywords" content="{{ $keywords ?? '' }}">
    <meta name="author" content="{{ $author ?? '' }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Vite CSS --}}
    {{-- {{ module_vite('build-media', 'resources/assets/sass/app.scss') }} --}}
</head>

<body>
    @yield('content')

    {{-- Vite JS --}}
    {{-- {{ module_vite('build-media', 'resources/assets/js/app.js') }} --}}
</body>
=======
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Module Media</title>

       {{-- Laravel Mix - CSS File --}}
       {{-- <link rel="stylesheet" href="{{ mix('css/media.css') }}"> --}}

    </head>
    <body>
        @yield('content')

        {{-- Laravel Mix - JS File --}}
        {{-- <script src="{{ mix('js/media.js') }}"></script> --}}
    </body>
</html>
>>>>>>> 771f698d (first)
