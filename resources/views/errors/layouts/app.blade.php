<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="Azea - Admin Panel HTML template" name="description">
    <meta content="Spruko Private Limited" name="author">
    <meta name="keywords"
        content="admin, admin dashboard template in php, admin panel bootstrap php theme, admin panel in php, admin panel template, admin template, best php admin panel, bootstrap 5 admin dashboard templates, dashboard, dashboard template, php admin panel, php admin panel template, php, admin template, php dashboard template, php framework">

    <!-- Title -->
    <title>Self Financing Library | {{ $title }}</title>

    <!--Favicon -->
    <link rel="icon" href="{{ asset('admin-assets/images/brand/favicon.ico') }}" type="image/x-icon">

    <!--Bootstrap css -->
    <link href="{{ asset('admin-assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Style css -->
    <link href="{{ asset('admin-assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/css/dark.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/css/skin-modes.css') }}" rel="stylesheet">

    <!-- Animate css -->
    <link href="{{ asset('admin-assets/css/animated.css') }}" rel="stylesheet">

    <!---Icons css-->
    <link href="{{ asset('admin-assets/css/icons.css') }}" rel="stylesheet">

    <!-- Color Skin css -->
    <link id="theme" href="{{ asset('admin-assets/colors/color1.css') }}" rel="stylesheet" type="text/css">


</head>

<body class="h-100vh bg-light">


    <!-- GLOBAL-LOADER -->
    {{-- <div id="global-loader">
        <img src="{{ 'admin-assets/images/svgs/loader.svg' }}" class="loader-img" alt="Loader">
    </div> --}}
    <!-- /GLOBAL-LOADER -->



    <div class="box">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>

    @yield('mainpage')



    <!-- End Page -->
    <!-- Jquery js-->
    <script src="{{ asset('admin-assets/js/jquery.min.js') }}"></script>

    <!-- Bootstrap5 js-->
    <script src="{{ asset('admin-assets/plugins/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!--Othercharts js-->
    <script src="{{ asset('admin-assets/plugins/othercharts/jquery.sparkline.min.js') }}"></script>

    <!-- Circle-progress js-->
    <script src="{{ asset('admin-assets/js/circle-progress.min.js') }}"></script>

    <!-- Jquery-rating js-->
    <script src="{{ asset('admin-assets/plugins/rating/jquery.rating-stars.js') }}"></script>

    <!-- Show Password -->
    <script src="{{ asset('admin-assets/js/bootstrap-show-password.min.js') }}"></script>

    <!-- Custom js-->
    <script src="{{ asset('admin-assets/js/custom.js') }}"></script>


</body>

</html>
