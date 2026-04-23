<!doctype html>
<html lang="uz">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>@yield('title', 'TeachPort — Avtorizatsiya')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Favicons --}}
    <link rel="shortcut icon" href="{{ asset('assets/media/nurafshon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/media/nurafshon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/media/nurafshon.png') }}">

    {{-- Shriftlar va Dashmix framework --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/dashmix.min.css') }}">
    @stack('css')
</head>

<body>

    <div id="page-container">
        <!-- Main Container -->
        @yield('content')
        <!-- END Main Container -->
    </div>

    <script src="{{ asset('assets/js/dashmix.app.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    
    @stack('js')
</body>

</html>