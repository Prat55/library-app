<x-guest-layout>
    @section('title')
        Personal Information
    @endsection

    <!--============= Hero Section Starts Here =============-->
    <div class="hero-section style-2">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="#0">My Account</a>
                </li>
                <li>
                    <span>{{ auth()->user()->name }}</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center" data-background="{{ asset('user-assets/images/banner/hero-bg.png') }}">
        </div>
    </div>
    <!--============= Hero Section Ends Here =============-->


    <!--============= Dashboard Section Starts Here =============-->
    <section class="dashboard-section padding-bottom mt--240 mt-lg--440 pos-rel">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-7 col-lg-4">
                    <div class="dashboard-widget mb-30 mb-lg-0 sticky-menu">
                        <div class="user">
                            <div class="thumb-area">
                                <div class="thumb" style="height: 100px;width:100px;overflow:hidden">
                                    @if (auth()->user()->profile_img)
                                        <img id="profile_img" src="/profileImg/{{ auth()->user()->profile_img }}"
                                            alt="user">
                                    @else
                                        <img id="profile_img" src="{{ asset('user-assets/images/dashboard/user.png') }}"
                                            alt="user">
                                    @endif
                                </div>
                                <label for="profile-pic" class="profile-pic-edit"><i
                                        class="flaticon-pencil"></i></label>
                                <input type="file" id="profile-pic" name="profile_pic" class="d-none">
                                <input type="hidden" name="UserId" id="UserId" value="{{ auth()->user()->uid }}">
                            </div>
                            <div class="content">
                                <ul id="errstatus">

                                </ul>
                                <div id="sStatus">

                                </div>
                                <h5 class="title"><a href="#0">{{ auth()->user()->name }}</a></h5>
                                <span class="username"><a href="mailto: info@library.com"
                                        class="__cf_email__">{{ auth()->user()->email }}</a></span>
                            </div>
                        </div>
                        <ul class="dashboard-menu">
                            <li>
                                <a href="#0" class="active"><i class="flaticon-settings"></i>Personal Profile </a>
                            </li>
                            {{-- <li>
                                <a href="my-bid.html"><i class="flaticon-auction"></i>My Books</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        @if (!auth()->user()->email_verified_at)
                            <div class="col-12">
                                <div class="dash-pro-item mb-30 dashboard-widget">
                                    <div class="header">
                                        <h4 class="title">Verify Your Email Address</h4>
                                    </div>
                                    <ul class="dash-pro-body">
                                        <form method="POST" action="{{ route('verification.send') }}">
                                            @csrf

                                            <div>
                                                <button type="submit" class="mt-2 btn btn-sm btn-outline-primary">
                                                    Send Verification Email
                                                </button>
                                            </div>
                                        </form>
                                    </ul>
                                </div>
                            </div>
                        @endif

                        <div class="col-12">
                            <div class="dash-pro-item mb-30 dashboard-widget">
                                <div class="header">
                                    <h4 class="title">Issued/Requested Book</h4>
                                </div>
                                <ul class="dash-pro-body">

                                    <img src="{{ asset('storage/' . $issuedBook->book->book_image_path) }}"
                                        alt="{{ $issuedBook->book->book_author }}" height="380px" width="220px">
                                    <p class="">Book Title:</span>
                                        {{ $issuedBook->book->book_name }}</p>
                                    @if ($issuedBook->start_date && $issuedBook->end_date)
                                        <p>Issued Date: <span>{{ $issuedBook->start_date }}</span></p>
                                        <p>Return Date: <span>{{ $issuedBook->end_date }}</span></p>
                                    @endif
                                    @if ($issuedBook->status === 'request')
                                        <span class="text-red-500">Collect your book from library</span>
                                    @endif
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Dashboard Section Ends Here =============-->
</x-guest-layout>
