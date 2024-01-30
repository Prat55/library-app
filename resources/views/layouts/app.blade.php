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
    <link rel="icon" href="{{ 'admin-assets/images/brand/favicon.ico' }}" type="image/x-icon">

    <!--Bootstrap css -->
    <link id="style" href="{{ 'admin-assets/plugins/bootstrap/css/bootstrap.min.css' }}" rel="stylesheet">

    <!-- Style css -->
    <link href="{{ 'admin-assets/css/style.css' }}" rel="stylesheet">
    <link href="{{ 'admin-assets/css/dark.css' }}" rel="stylesheet">
    <link href="{{ 'admin-assets/css/skin-modes.css' }}" rel="stylesheet">

    <!-- Animate css -->
    <link href="{{ 'admin-assets/css/animated.css' }}" rel="stylesheet">


    <!-- P-scroll bar css-->
    <link href="{{ 'admin-assets/plugins/p-scrollbar/p-scrollbar.css' }}" rel="stylesheet">

    <!---Icons css-->
    <link href="{{ 'admin-assets/css/icons.css' }}" rel="stylesheet">

    <!-- Color Skin css -->
    <link id="theme" href="{{ 'admin-assets/colors/color1.css' }}" rel="stylesheet" type="text/css">

    <!-- INTERNAL Switcher css -->
    <link href="{{ 'admin-assets/switcher/css/switcher.css' }}" rel="stylesheet">
    <link href="{{ 'admin-assets/switcher/demo.css' }}" rel="stylesheet">
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
</head>

<body class="app sidebar-mini {{ auth()->user()->mode === 'dark' ? 'dark-mode' : '' }}">

    <!-- Switcher -->
    <div class="switcher-wrapper">
        <div class="demo_changer ">
            <div class="form_holder sidebar-right1">
                <div class="row">
                    <div class="predefined_styles">
                        <div class="text-center swichermainleft">
                            <div class="gap-2 p-3 d-grid">
                                <a href="https://php.spruko.com/azea/" class="mt-0 btn ripple btn-primary">View Demo</a>
                                <a href="https://themeforest.net/item/azea-bootstrap-5-admin-dashboard-template/33518740"
                                    class="btn ripple btn-success">Buy Now</a>
                                <a href="https://themeforest.net/user/spruko/portfolio" class="btn ripple btn-red">Our
                                    Portfolio</a>
                            </div>
                        </div>
                        <div class="text-center swichermainleft">
                            <div class="gap-2 p-3 d-grid">
                                <a href="https://php.spruko.com/azea/azea/horizontal"
                                    class="mt-0 btn ripple btn-primary">horizontal Menu</a>
                            </div>
                        </div>
                        <div class="text-center swichermainleft">
                            <h4>LTR AND RTL VERSIONS</h4>
                            <div class="p-4 switch_section">
                                <div class="mt-2 switch-toggle d-flex">
                                    <span class="me-auto">LTR</span>
                                    <a class="onoffswitch2"><input type="radio" name="onoffswitch25"
                                            id="myonoffswitch54" class="onoffswitch2-checkbox" checked="">
                                        <label for="myonoffswitch54" class="onoffswitch2-label"></label>
                                    </a>
                                </div>
                                <div class="mt-2 switch-toggle d-flex">
                                    <span class="me-auto">RTL</span>
                                    <a class="onoffswitch2"><input type="radio" name="onoffswitch25"
                                            id="myonoffswitch55" class="onoffswitch2-checkbox">
                                        <label for="myonoffswitch55" class="onoffswitch2-label"></label>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4>Theme Style</h4>
                            <div class="skin-body">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex">
                                        <span class="me-auto">Light Theme</span>
                                        <a class="onoffswitch2"><input type="radio" name="onoffswitch1"
                                                id="myonoffswitch1" class="onoffswitch2-checkbox" checked="">
                                            <label for="myonoffswitch1" class="onoffswitch2-label"></label>
                                        </a>
                                    </div>
                                    <div class="mt-2 switch-toggle d-flex">
                                        <span class="me-auto">Dark Theme</span>
                                        <a class="onoffswitch2"><input type="radio" name="onoffswitch1"
                                                id="myonoffswitch2" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch2" class="onoffswitch2-label"></label>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4>Leftmenu Styles</h4>
                            <div class="skin-body">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex">
                                        <span class="me-auto">Light Menu</span>
                                        <a class="onoffswitch2"><input type="radio" name="onoffswitch2"
                                                id="myonoffswitch3" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch3" class="onoffswitch2-label"></label>
                                        </a>
                                    </div>
                                    <div class="mt-2 switch-toggle d-flex">
                                        <span class="me-auto">Color Menu</span>
                                        <a class="onoffswitch2"><input type="radio" name="onoffswitch2"
                                                id="myonoffswitch4" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch4" class="onoffswitch2-label"></label>
                                        </a>
                                    </div>
                                    <div class="mt-2 switch-toggle d-flex">
                                        <span class="me-auto">Dark Menu</span>
                                        <a class="onoffswitch2"><input type="radio" name="onoffswitch2"
                                                id="myonoffswitch5" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch5" class="onoffswitch2-label"></label>
                                        </a>
                                    </div>
                                    <div class="mt-2 switch-toggle d-flex">
                                        <span class="me-auto">Gradient Menu</span>
                                        <a class="onoffswitch2"><input type="radio" name="onoffswitch2"
                                                id="myonoffswitch25" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch25" class="onoffswitch2-label"></label>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4>Header Styles</h4>
                            <div class="skin-body">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex">
                                        <span class="me-auto">Light Header</span>
                                        <a class="onoffswitch2"><input type="radio" name="onoffswitch3"
                                                id="myonoffswitch6" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch6" class="onoffswitch2-label"></label>
                                        </a>
                                    </div>
                                    <div class="mt-2 switch-toggle d-flex">
                                        <span class="me-auto">Color Header</span>
                                        <a class="onoffswitch2"><input type="radio" name="onoffswitch3"
                                                id="myonoffswitch7" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch7" class="onoffswitch2-label"></label>
                                        </a>
                                    </div>
                                    <div class="mt-2 switch-toggle d-flex">
                                        <span class="me-auto">Dark Header</span>
                                        <a class="onoffswitch2"><input type="radio" name="onoffswitch3"
                                                id="myonoffswitch8" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch8" class="onoffswitch2-label"></label>
                                        </a>
                                    </div>
                                    <div class="mt-2 switch-toggle d-flex">
                                        <span class="me-auto">Gradient Header</span>
                                        <a class="onoffswitch2"><input type="radio" name="onoffswitch3"
                                                id="myonoffswitch26" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch26" class="onoffswitch2-label"></label>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4>Layout Width Styles</h4>
                            <div class="skin-body">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex">
                                        <span class="me-auto">Full Width</span>
                                        <a class="onoffswitch2"><input type="radio" name="onoffswitch4"
                                                id="myonoffswitch9" class="onoffswitch2-checkbox" checked="">
                                            <label for="myonoffswitch9" class="onoffswitch2-label"></label>
                                        </a>
                                    </div>
                                    <div class="mt-2 switch-toggle d-flex">
                                        <span class="me-auto">Boxed</span>
                                        <a class="onoffswitch2"><input type="radio" name="onoffswitch4"
                                                id="myonoffswitch10" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch10" class="onoffswitch2-label"></label>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4>Layout Positions</h4>
                            <div class="skin-body">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex">
                                        <span class="me-auto">Fixed</span>
                                        <a class="onoffswitch2"><input type="radio" name="onoffswitch5"
                                                id="myonoffswitch11" class="onoffswitch2-checkbox" checked="">
                                            <label for="myonoffswitch11" class="onoffswitch2-label"></label>
                                        </a>
                                    </div>
                                    <div class="mt-2 switch-toggle d-flex">
                                        <span class="me-auto">Scrollable</span>
                                        <a class="onoffswitch2"><input type="radio" name="onoffswitch5"
                                                id="myonoffswitch12" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch12" class="onoffswitch2-label"></label>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4>Sidemenu layout Styles</h4>
                            <div class="skin-body">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex">
                                        <span class="me-auto">Default Menu</span>
                                        <a class="onoffswitch2"><input type="radio" name="onoffswitch6"
                                                id="myonoffswitch13" class="onoffswitch2-checkbox default-menu"
                                                checked="">
                                            <label for="myonoffswitch13" class="onoffswitch2-label"></label>
                                        </a>
                                    </div>
                                    <div class="mt-2 switch-toggle d-flex">
                                        <span class="me-auto">Closed Menu</span>
                                        <a class="onoffswitch2"><input type="radio" name="onoffswitch6"
                                                id="myonoffswitch30" class="onoffswitch2-checkbox default-menu">
                                            <label for="myonoffswitch30" class="onoffswitch2-label"></label>
                                        </a>
                                    </div>
                                    <div class="mt-2 switch-toggle d-flex">
                                        <span class="me-auto">Icon with Text</span>
                                        <a class="onoffswitch2"><input type="radio" name="onoffswitch6"
                                                id="myonoffswitch14" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch14" class="onoffswitch2-label"></label>
                                        </a>
                                    </div>
                                    <div class="mt-2 switch-toggle d-flex">
                                        <span class="me-auto">Icon Overlay</span>
                                        <a class="onoffswitch2"><input type="radio" name="onoffswitch6"
                                                id="myonoffswitch15" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch15" class="onoffswitch2-label"></label>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Switcher -->
    <!-- GLOBAL-LOADER -->
    {{-- <div id="global-loader">
        <img src="admin-assets/images/svgs/loader.svg" class="loader-img" alt="Loader">
    </div> --}}
    <!-- /GLOBAL-LOADER -->

    <!-- Page -->
    <div class="page">
        <div class="page-main">

            @livewire('navigation-menu')

            <!-- App-Content -->
            <div class="app-content main-content">
                <div class="side-app">

                    @include('layouts.partials.header')

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
                            <span class="fa fa-heart text-danger"></span> by <a href="javascript:void(0);"> Pratik
                            </a> & <a href="javascript:void(0);">Milind</a> All rights reserved
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

    <!-- Bootstrap5 js-->
    {{-- <script src="{{ 'admin-assets/plugins/bootstrap/popper.min.js' }}"></script>
    <script src="{{ 'admin-assets/plugins/bootstrap/js/bootstrap.min.js' }}"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

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


</body>

</html>
