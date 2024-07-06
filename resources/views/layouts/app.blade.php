<!DOCTYPE html>
<html lang="en">

<head>

    {{-- <!-- Meta data --> --}}
    <meta charset="UTF-8">

    <!-- Title -->
    <title>Library | @yield('title')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Favicon -->
    <link rel="icon" href="{{ 'admin-assets/images/logo/lms_logo_mobile.png' }}" type="image/x-icon">

    <!--Bootstrap css -->
    <link id="style" href="{{ 'admin-assets/plugins/bootstrap/css/bootstrap.min.css' }}" rel="stylesheet">

    <!-- Style css -->
    <link href="{{ 'admin-assets/css/style.css' }}" rel="stylesheet">
    <link href="{{ 'admin-assets/css/dark.css' }}" rel="stylesheet">
    <link href="{{ 'admin-assets/css/skin-modes.css' }}" rel="stylesheet">

    <!-- Animate css -->
    {{-- <link href="{{ 'admin-assets/css/animated.css' }}" rel="stylesheet"> --}}


    <!-- P-scroll bar css-->
    <link href="{{ 'admin-assets/plugins/p-scrollbar/p-scrollbar.css' }}" rel="stylesheet">

    <!---Icons css-->
    {{-- <link href="{{ 'admin-assets/css/icons.css' }}" rel="stylesheet"> --}}

    <!-- Color Skin css -->
    <link id="theme" href="{{ 'admin-assets/colors/color1.css' }}" rel="stylesheet" type="text/css">

    <!-- INTERNAL Switcher css -->
    {{-- <link href="{{ 'admin-assets/switcher/css/switcher.css' }}" rel="stylesheet"> --}}
    {{-- <link href="{{ 'admin-assets/switcher/demo.css' }}" rel="stylesheet"> --}}
    <!-- INTERNAL Morris Charts css -->
    <link href="{{ 'admin-assets/plugins/morris/morris.css?v=1692028428' }}" rel="stylesheet">

    <!-- INTERNAL Select2 css -->
    <link href="{{ 'admin-assets/plugins/select2/select2.min.css?v=1692028428' }}" rel="stylesheet">

    <!-- Data table css -->
    <link href="{{ 'admin-assets/plugins/datatables/DataTables/css/dataTables.bootstrap5.css' }}" rel="stylesheet">
    <link href="{{ 'admin-assets/plugins/datatables/Buttons/css/buttons.bootstrap5.min.css' }}" rel="stylesheet">
    <link href="{{ 'admin-assets/plugins/datatables/Responsive/css/responsive.bootstrap5.min.css' }}" rel="stylesheet">

    <!-- Color Skin css -->
    <link id="theme" href="{{ 'admin-assets/colors/color1-1.css?v=1692028428' }}" rel="stylesheet" type="text/css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="app sidebar-mini {{ auth()->user()->mode === 'dark' ? 'dark-mode' : '' }}">

    <!-- Page -->
    <div class="page">
        <div class="page-main">

            @livewire('navigation-menu')

            <!-- App-Content -->
            <div class="app-content main-content">
                <div class="side-app">

                    @livewire('header')

                    <main>
                        {{ $slot }}
                    </main>
                </div>
            </div>
            <!-- End app-content-->

            <!--Footer-->
            <footer class="footer">
                <div class="container">
                    <div class="flex-row-reverse row align-items-center">
                        <div class="text-center col-md-12 col-sm-12">
                            Copyright &copy; 2023 <a href="javascript:void(0);">Self Financing Library</a>. Designed
                            with
                            <span class="fa fa-heart text-danger"></span> by <a
                                href="https://myportfolio-pratik.vercel.app" target="_blank">
                                Pratik
                            </a> & <a href="javascript:void(0);">Milind</a> All rights reserved
                            <h3>v2.2.0</h3>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End Footer-->
        </div>
    </div>

    <!-- End Page -->
    <!-- Back to top -->
    <a href="#top" id="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- Jquery js-->
    <script src="{{ 'admin-assets/js/jquery.min.js' }}"></script>

    {{-- * csrf token generator * --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <script src="{{ 'admin-assets/plugins/bootstrap/js/bootstrap.min.js' }}"></script>

    <!--Othercharts js-->
    <script src="{{ 'admin-assets/plugins/othercharts/jquery.sparkline.min.js' }}"></script>

    <!-- Circle-progress js-->
    <script src="{{ 'admin-assets/js/circle-progress.min.js' }}"></script>

    <!-- Jquery-rating js-->
    <script src="{{ 'admin-assets/plugins/rating/jquery.rating-stars.js' }}"></script>

    <!--Sidemenu js-->
    <script src="{{ 'admin-assets/plugins/sidemenu/sidemenu.js' }}"></script>

    <!-- P-scroll js-->
    <script src="{{ 'admin-assets/plugins/p-scrollbar/p-scrollbar.js' }}"></script>
    <script src="{{ 'admin-assets/plugins/p-scrollbar/p-scroll1.js' }}"></script>
    <script src="{{ 'admin-assets/plugins/p-scrollbar/p-scroll.js' }}"></script>

    <!-- Custom js-->
    <script src="{{ 'admin-assets/js/custom.js' }}"></script>
    <script src="{{ 'admin-assets/js/book.js' }}"></script>
    <script src="{{ 'admin-assets/js/profile.js' }}"></script>
    @yield('scripts')

    <!-- Switcher js -->
    <script src="{{ 'admin-assets/switcher/js/switcher.js' }}"></script>
    <!--INTERNAL Flot Charts js-->
    <script src="{{ 'admin-assets/plugins/flot/jquery.flot.js?v=1692028428' }}"></script>
    <script src="{{ 'admin-assets/plugins/flot/jquery.flot.fillbetween.js?v=1692028428' }}"></script>
    <script src="{{ 'admin-assets/plugins/flot/jquery.flot.pie.js?v=1692028428' }}"></script>
    <script src="{{ 'admin-assets/js/dashboard.sampledata.js?v=1692028428' }}"></script>
    <script src="{{ 'admin-assets/js/chart.flot.sampledata.js?v=1692028428' }}"></script>

    <!-- INTERNAL Chart js -->
    <script src="{{ 'admin-assets/plugins/chart/chart.bundle.js?v=1692028428' }}"></script>
    <script src="{{ 'admin-assets/plugins/chart/utils.js?v=1692028428' }}"></script>

    <!-- INTERNAL Apexchart js -->
    <script src="{{ 'admin-assets/js/apexcharts.js?v=1692028428' }}"></script>

    <!--INTERNAL Moment js-->
    <script src="{{ 'admin-assets/plugins/moment/moment.js?v=1692028428' }}"></script>

    <!--INTERNAL Index js-->
    <script src="{{ 'admin-assets/js/index1.js?v=1692028428' }}"></script>

    <!-- INTERNAL Data tables -->
    <script src="{{ 'admin-assets/plugins/datatables/DataTables/js/jquery.dataTables.js?v=1692028428' }}"></script>
    <script src="{{ 'admin-assets/plugins/datatables/DataTables/js/dataTables.bootstrap5.js?v=1692028428' }}"></script>
    <script src="{{ 'admin-assets/plugins/datatables/Responsive/js/dataTables.responsive.min.js?v=1692028428' }}"></script>
    <script src="{{ 'admin-assets/plugins/datatables/Responsive/js/responsive.bootstrap5.min.js?v=1692028428' }}"></script>

    <!-- INTERNAL Select2 js -->
    <script src="{{ 'admin-assets/plugins/select2/select2.full.min.js?v=1692028428' }}"></script>
    <script src="{{ 'admin-assets/js/select2.js?v=1692028428' }}"></script>

    @stack('modal')
    @livewireScripts
</body>

</html>
