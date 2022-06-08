<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="{{ asset('static/css/santri.css') }}" rel="stylesheet">
    <link href="{{ asset('static/css/toastr.css') }}" rel="stylesheet">
    <link href="{{ asset('static/css/w3.css') }}" rel="stylesheet">
    <link href="{{ asset('static/css-awesome/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('static/css-awesome/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('static/css-awesome/regular.css') }}" rel="stylesheet">
    <link href="{{ asset('static/css-awesome/solid.css') }}" rel="stylesheet">
    <link href="{{ asset('static/css-awesome/svg-with-js.css') }}" rel="stylesheet">
    <link href="{{ asset('static/css-awesome/v4-shims.css') }}" rel="stylesheet">
    <script src="{{ asset('static/js/jquery.js') }}"></script>
    <script src="{{ asset('static/js/toastr.min.js') }}"></script>
    <script src="{{ asset('static/js/sweetalert2.all.min.js') }}"></script>
    @yield('css-js')
</head>
<body id="page-top">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('content')
</body>

</html>