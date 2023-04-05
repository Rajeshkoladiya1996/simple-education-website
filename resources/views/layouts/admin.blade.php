<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Education</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{URL::to('storage/app/public/Adminassets/css/bootstrap.min.css')}}" id="bootstrap-style"
        rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{URL::to('storage/app/public/Adminassets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{URL::to('storage/app/public/Adminassets/css/app.min.css')}}" id="app-style" rel="stylesheet"
        type="text/css" />
    @yield('css')
</head>

<body data-topbar="dark" data-layout="horizontal">

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('includes.Admin.header')

        @include('includes.Admin.sidebar')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            @yield('content')
        </div>
        <!-- JAVASCRIPT -->
        <script src="{{URL::to('storage/app/public/Adminassets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{URL::to('storage/app/public/Adminassets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{URL::to('storage/app/public/Adminassets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{URL::to('storage/app/public/Adminassets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{URL::to('storage/app/public/Adminassets/libs/node-waves/waves.min.js')}}"></script>

        @yield('js')


        <script src="{{URL::to('storage/app/public/Adminassets/js/app.js')}}"></script>

</body>

</html>