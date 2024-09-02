<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Posyandu') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=abyssinica-sil:400|akshar:300,400,500,600,700|figtree:600|inter:400,500,600,700,800,900|nunito:400,500,600,700,800,900|source-sans-pro:200,300,400,600,700,900" rel="stylesheet" />
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="{{ asset('build/assets/app-DM6OwJrt.css') }}" data-navigate-track="reload"/>
    <script type="module" src="{{ asset('build/assets/app-DFq2sf4p.js') }}" data-navigate-track="reload"></script> 
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- TOAST CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <!-- CONDITION CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
    {{-- @isset($css)
        {{ $css }}
    @endisset --}}
</head>

<body class="font-inter antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- NAVBAR -->
        @include('layouts.navbar')
        <!-- SIDEBAR -->
        @include('layouts.sidebar')
        <!-- Page Content -->
        @include('layouts.main')
    </div>

    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @if (session('success'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.success('{{ Session('success') }}', 'Success');
        </script>
    @endif

    @isset($script)
        {{ $script }}
    @endisset

</body>

</html>
