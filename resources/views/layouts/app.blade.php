<!doctype html>
<html lang="uz">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'TeachPort — Cyber University')</title>

    {{-- Favicons --}}
    <link rel="shortcut icon" href="{{ asset('assets/media/nurafshon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/media/nurafshon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/media/nurafshon.png') }}">

    {{-- Shriftlar va Dashmix framework --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/dashmix.min.css') }}">
    <link rel="stylesheet" id="css-theme" href="{{ asset('assets/css/themes/xinspire.min.css') }}">

    {{-- Sahifaga xos CSS --}}
    @stack('css')
</head>

<body>

    <div id="page-container" class="page-header-dark main-content-boxed">
        @unless(request()->is('admin*') || request()->is('teacher*') || request()->is('articles*'))
            @include('partials.header')
        @endunless

        @yield('content')

        @unless(request()->is('admin*') || request()->is('teacher*') || request()->is('articles*'))
            @include('layouts.footer')
        @endunless
    </div>

    {{-- Asosiy JS --}}
    <script src="{{ asset('assets/js/dashmix.app.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    {{-- Flash xabarlar --}}
    @if(session()->has('success'))
    <script>
        Dashmix.helpers('jq-notify', {
            type: 'info',
            icon: 'fa fa-info-circle me-1',
            message: "{{ session('success') }}"
        });
    </script>
    @endif

    @if(session()->has('error'))
    <script>
        Dashmix.helpers('jq-notify', {
            type: 'danger',
            icon: 'fa fa-exclamation-circle me-1',
            message: "{{ session('error') }}"
        });
    </script>
    @endif

    {{-- Sahifaga xos JS --}}
    @stack('js')

</body>

</html>