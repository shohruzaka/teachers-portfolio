<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Portfolio Nurafshon TATU</title>

    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{asset('assets/media/nurafshon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('assets/media/nurafshon.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/media/nurafshon.png')}}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <!-- <link rel="stylesheet" href="{{asset('assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}"> -->

    <!-- Fonts and Dashmix framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">


    <link rel="stylesheet" href="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css') }}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->

    <link rel="stylesheet" id="css-main" href="{{asset('assets/css/dashmix.min.css')}}">
    <link rel="stylesheet" id="css-theme" href="{{ asset('assets/css/themes/xinspire.min.css') }}">





    <!-- END Stylesheets -->
</head>

<body>

    <div id="page-container" class="page-header-dark main-content-boxed">
        @yield('content')


        @include('layouts.footer')
    </div>


    <script src="{{asset('assets/js/dashmix.app.min.js')}}"></script>

    <!-- jQuery (required for BS Datepicker plugin) -->
    <script src="{{asset('assets/js/lib/jquery.min.js')}}"></script>

    <!-- Page JS Plugins -->
    <!-- <script src="{{asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script> -->
    <script src="{{asset('assets/js/plugins/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>



    <!-- <script>Dashmix.helpersOnLoad(['js-flatpickr', 'jq-select2', 'jq-datepicker']);</script> -->

    <script>
        flatpickr("#flatpickr-default", {});

        $(document).ready(function() {
            $('#select2-multiple').select2();
        });
    </script>

    @if (session()->has('success'))
    <script>
        Dashmix.helpers('jq-notify', {
            type: 'info',
            icon: 'fa fa-info-circle me-1',
            message: "{{session('success')}}"
        });
    </script>
    @endif
    <!-- Page JS Helpers (BS Datepicker plugin) -->

</body>

</html>