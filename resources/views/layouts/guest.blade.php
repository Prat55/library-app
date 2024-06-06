<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name', 'Library') }} | @yield('title')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('user-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user-assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user-assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('user-assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('user-assets/css/owl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user-assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('user-assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('user-assets/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user-assets/css/main.css') }}">

    <link rel="shortcut icon" href="{{ asset('user-assets/images/favicon.png') }}" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    <!--============= ScrollToTop Section Starts Here =============-->
    {{-- <div class="overlayer" id="overlayer">
        <div class="loader">
            <div class="loader-inner"></div>
        </div>
    </div> --}}
    <a href="#0" class="scrollToTop"><i class="fas fa-angle-up"></i></a>
    <div class="overlay"></div>
    <!--============= ScrollToTop Section Ends Here =============-->


    <!--============= Header Section Starts Here =============-->
    <header>
        <div class="header-top">
            <div class="container">
                <div class="header-top-wrapper">
                    <ul class="customer-support">
                        <li>
                            <a href="{{ route('contact') }}" class="mr-3"><i class="fas fa-phone-alt"></i><span
                                    class="ml-2 d-none d-sm-inline-block">Customer Support</span></a>
                        </li>
                    </ul>
                    <ul class="cart-button-area">
                        <li class="d-flex justify-content-end align-items-center">
                            @include('backend.message')
                        </li>
                        <li>
                            @auth
                                @if (auth()->user()->role === 'admin' || auth()->user()->role === 'super-admin')
                                    <a href="{{ route('profile.show') }}" class="user-button">
                                        <i class="flaticon-user"></i>
                                    </a>
                                @else
                                    <a href="{{ route('user.profile') }}" class="user-button">
                                        @if (auth()->check() && auth()->user()->profile_photo_path)
                                            <div style="height:40px;width:40px;border-radius: 50%;overflow:hidden">
                                                <img src="/profile-img/{{ auth()->user()->profile_photo_path }}"
                                                    alt="{{ auth()->user()->name }}" style="width:100%">
                                            </div>
                                        @else
                                            <i class="flaticon-user"></i>
                                        @endif
                                    </a>
                                @endif
                            @else
                                <a href="{{ route('user.profile') }}" class="user-button"
                                    style="height: 40px;width:40px;overflow:hidden">
                                    @if (auth()->check() && auth()->user()->profile_photo_path)
                                        <img src="/profile-img/{{ auth()->user()->profile_photo_path }}"
                                            alt="{{ auth()->user()->name }}" style="border-radius: 50% ">
                                    @else
                                        <i class="flaticon-user"></i>
                                    @endif
                                </a>
                            @endauth
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo">
                        <a href="/">
                            <img src="{{ asset('user-assets/images/logo/lms_logo.png') }}" alt="logo">
                        </a>
                    </div>
                    <ul class="ml-auto menu">
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('books') }}">books</a>
                        </li>
                        @if (auth()->check())
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-sm" style="color: white">Logout</button>
                                </form>
                            </li>
                            @if (auth()->user()->role === 'admin' || auth()->user()->role === 'super-admin')
                                <li>
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                            @endif
                        @else
                            <li>
                                <a href="{{ route('login') }}">Login</a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}">Register</a>
                            </li>
                        @endif


                        <li>
                            <a href="{{ route('contact') }}">Contact Us</a>
                        </li>
                    </ul>

                    <div class="header-bar d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="position-relative">
                <div style="position: absolute; top:-81px;right:12%;">

                </div>
            </div>
        </div>

    </header>
    <!--============= Header Section Ends Here =============-->


    <div>
        {{ $slot }}
    </div>

    <!--============= Footer Section Starts Here =============-->
    <footer class="bg_img padding-top oh" data-background="{{ asset('user-assets/images/footer/footer-bg.jpg') }}">
        <div class="footer-top-shape">
            <img src="{{ asset('user-assets/css/img/footer-top-shape.png') }}" alt="css">
        </div>
        <div class="anime-wrapper">
            <div class="anime-1 plus-anime">
                <img src="{{ asset('user-assets/images/footer/p1.png') }}" alt="footer">
            </div>
            <div class="anime-2 plus-anime">
                <img src="{{ asset('user-assets/images/footer/p2.png') }}" alt="footer">
            </div>
            <div class="anime-3 plus-anime">
                <img src="{{ asset('user-assets/images/footer/p3.png') }}" alt="footer">
            </div>
            <div class="anime-5 zigzag">
                <img src="{{ asset('user-assets/images/footer/c2.png') }}" alt="footer">
            </div>
            <div class="anime-6 zigzag" id="contact">
                <img src="{{ asset('user-assets/images/footer/c3.png') }}" alt="footer">
            </div>
            <div class="anime-7 zigzag">
                <img src="{{ asset('user-assets/images/footer/c4.png') }}" alt="footer">
            </div>
        </div>
        <div class="newslater-wrapper">
            <div class="container">
                <div class="newslater-area">
                    <div class="newslater-thumb">
                        <img src="{{ asset('user-assets/images/footer/newslater.png') }}" alt="footer">
                    </div>
                    <div class="newslater-content">
                        <div class="section-header left-style mb-low">
                            <h5 class="cate">Subscribe to Library</h5>
                            <h3 class="title">To Get Exclusive Books First</h3>
                        </div>
                        <form class="subscribe-form">
                            <input type="text" placeholder="Enter Your Email" name="email">
                            <button type="submit" class="custom-button" style="color: #000">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-top padding-bottom padding-top">
            <div class="container">
                <div class="row mb--60 footer-area">
                    <div class="col-sm-6 col-lg-3">
                        <div class="footer-widget widget-links">
                            <h5 class="title">Books Categories</h5>
                            <ul class="links-list">
                                @forelse ($faculties as $faculty)
                                    <li>
                                        <a href="#{{ $faculty->f_name }}">{{ $faculty->faculty_name }}</a>
                                    </li>
                                @empty
                                    <li>
                                        <a href="#0">No faculty added!</a>
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="footer-widget widget-links">
                            <h5 class="title">We're Here to Help</h5>
                            <ul class="links-list">
                                <li>
                                    <a href="{{ route('user.profile') }}">Your Account</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="footer-widget widget-follow">
                            <h5 class="title">Follow Us</h5>
                            <ul class="links-list">
                                <li>
                                    <a href="#0"><i class="fas fa-phone-alt"></i>123-456-789</a>
                                </li>
                                <li>
                                    <a href="#0"><i class="fas fa-blender-phone"></i>123-456-789</a>
                                </li>
                                <li>
                                    <a href="mailto: info@library.com">
                                        <i class="fas fa-envelope-open-text"></i>
                                        <span class="__cf_email__"
                                            data-cfemail="ed8588819dad88838a829985888088c38e8280">
                                            info@library.com
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#0"><i class="fas fa-location-arrow"></i>Palghar SDSM College</a>
                                </li>
                            </ul>
                            <ul class="social-icons">
                                <li>
                                    <a href="#0" class="active"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="#0"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#0"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="#0"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="copyright-area">
                    <div class="footer-bottom-wrapper">
                        <div class="justify-content-around logo">
                            <a href="/" class="footer-logo"><img
                                    src="{{ asset('user-assets/images/logo/lms_logo.png') }}" alt="logo"></a>
                        </div>

                        <div class="copyright">
                            <p>&copy; Copyright 2023 | <a href="#0">Self Financing Library</a> By <a
                                    href="#0">Pratik & Milind</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--============= Footer Section Ends Here =============-->



    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('user-assets/js/jquery-3.3.1.min.js') }}"></script>
    {{-- * csrf token generator * --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @yield('scripts')

    <script src="{{ asset('user-assets/js/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('user-assets/js/plugins.js') }}"></script>
    <script src="{{ asset('user-assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user-assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('user-assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('user-assets/js/waypoints.js') }}"></script>
    <script src="{{ asset('user-assets/js/nice-select.js') }}"></script>
    <script src="{{ asset('user-assets/js/counterup.min.js') }}"></script>
    <script src="{{ asset('user-assets/js/owl.min.js') }}"></script>
    <script src="{{ asset('user-assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('user-assets/js/yscountdown.min.js') }}"></script>
    <script src="{{ asset('user-assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('user-assets/js/main.js') }}"></script>
    <script src="{{ asset('user-assets/js/profile.js') }}"></script>

    @livewireScripts
</body>

</html>
