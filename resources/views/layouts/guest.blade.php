<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.bunny.net/css?family=abyssinica-sil:400|akshar:300,400,500,600,700|figtree:600|nunito:400,500,600,700,800,900|source-sans-pro:200,300,400,600,700,900"
        rel="stylesheet" />
    {{-- <script src="https://kit.fontawesome.com/b74aab3200.js" crossorigin="anonymous"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-BrvCqdWe.css') }}" data-navigate-track="reload"/>
    <script type="module" src="{{ asset('build/assets/app-DFq2sf4p.js') }}" data-navigate-track="reload"></script>  --}}

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('build/assets/style.css') }}">
</head>

<body class="font-poppins antialiased">
    <div>
        {{ $slot }}
    </div>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    @isset($script)
        {{ $script }}
    @endisset
</body>
</html>
