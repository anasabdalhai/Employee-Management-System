<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} | @yield('title')</title>

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition layout-top-nav">
<div class="wrapper">

    <!-- Header -->
    @include('layouts.sections.header')

    <!-- Main Content -->
    <div class="content-wrapper">
        <div class="content">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Footer -->
    {{-- @include('layouts.sections.footer') --}}

</div>

<!-- Scripts -->
<script src="{{ asset('assets/dashboard/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/dist/js/adminlte.min.js') }}"></script>

@stack('scripts')
</body>
</html>
