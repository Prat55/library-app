<x-guest-layout>
    @section('title')
        Profile
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
                            {{-- * User email and username with profile photo section * --}}
                            <div class="thumb-area">
                                <div class="thumb" style="height: 100px;width:100px;overflow:hidden">
                                    @if (auth()->user()->profile_photo_path)
                                        <img id="profile_img"
                                            src="/profile-img/{{ auth()->user()->profile_photo_path }}"
                                            alt="{{ auth()->user()->name }}">
                                    @else
                                        <img id="profile_img" src="{{ asset('user-assets/images/dashboard/user.png') }}"
                                            alt="user">
                                    @endif
                                    <input type="hidden" name="userid" id="userId"
                                        value="{{ auth()->user()->id }}">
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
                        {{-- * Email verification section * --}}
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

                        {{-- * Issued/requested book section * --}}
                        <div class="col-12">
                            <div class="dash-pro-item mb-30 dashboard-widget">
                                <div class="header">
                                    <h4 class="title">Issued/Requested Book</h4>
                                </div>
                                <ul class="dash-pro-body">
                                    @if ($issuedBook)
                                        <a class="p-relative">
                                            <img src="{{ asset('storage/' . $issuedBook->book->book_image_path) }}"
                                                alt="{{ $issuedBook->book->book_author }}" height="380px"
                                                width="220px">

                                            <div>
                                                @if ($issuedBook->book->book_pdf_path)
                                                    <a href="{{ $issuedBook->book->book_pdf_path ? asset('storage/' . $issuedBook->book->book_pdf_path) : '#0' }}"
                                                        @if ($issuedBook->book->book_pdf_path) download @endif
                                                        class="rating"><i class="fa fa-file-pdf fa-lg"></i></a>
                                                @endif
                                            </div>
                                        </a>
                                        <p class="">Book Title:</span>
                                            {{ $issuedBook->book->book_name }}</p>
                                        @if ($issuedBook->start_date && $issuedBook->end_date)
                                            <p>Issued Date: <span>{{ $issuedBook->start_date }}</span></p>
                                            <p>Return Date: <span>{{ $issuedBook->end_date }}</span></p>
                                        @endif
                                        @if ($issuedBook->status === 'request')
                                            <span class="text-red-500">Collect your book from library</span>
                                        @endif
                                    @else
                                        <span>No book added!</span>
                                    @endif
                                </ul>
                            </div>
                        </div>

                        {{-- * User account information section * --}}
                        <div class="col-12">
                            <div class="dash-pro-item mb-30 dashboard-widget">
                                <div class="header">
                                    <h4 class="title">Academic Information</h4>
                                </div>
                                <ul class="dash-pro-body">
                                    <form action="/profile/update" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div>
                                            <h3>Library Card</h3>
                                            @if (auth()->user()->library_card)
                                                <div class="p-2" style="height: 350px;overflow:hidden">
                                                    <img src="{{ asset('storage/' . auth()->user()->library_card) }}"
                                                        alt="{{ auth()->user()->name }}">
                                                </div><br>
                                            @endif
                                            <input type="file"
                                                class="form-control w-full @error('library_card') is-invalid @enderror"
                                                name="library_card" id="library_card">
                                            @error('library_card')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div>
                                            <h3>Faculty
                                                {{ auth()->user()->faculty_id ? '' : '(Make sure before selecting. You cant modify this.)' }}
                                            </h3>
                                            @if (auth()->user()->faculty_id)
                                                <input type="text" class="form-control"
                                                    value="{{ auth()->user()->faculty->faculty_name }}" readonly>
                                            @else
                                                <select name="faculty" id="faculty"
                                                    class="form-control @error('faculty') is-invalid @enderror">
                                                    <option>Select your faculty</option>
                                                    @forelse ($faculties as $faculty)
                                                        <option value="{{ $faculty->id }}"
                                                            {{ $faculty->id === auth()->user()->faculty_id ? 'selected' : '' }}>
                                                            {{ $faculty->faculty_name }}
                                                        </option>
                                                    @empty
                                                        <option>No Faculty Found!</option>
                                                    @endforelse
                                                </select>
                                            @endif

                                            @error('faculty')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div>
                                            <h3>Phone</h3>
                                            <input type="text" name="phone" id="phone"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                value="{{ auth()->user()->phone }}" maxlength="10" minlength="10">

                                            @error('phone')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div><br>

                                        <div>
                                            <button class="btn btn-sm btn-outline-primary" type="submit">
                                                Update
                                            </button>
                                        </div>
                                    </form>
                                </ul>
                            </div>
                        </div>

                        {{-- * Two factor authentication section * --}}
                        {{-- <div class="col-12">
                            <div class="dash-pro-item mb-30 dashboard-widget">
                                <div class="header">
                                    <h4 class="title">Two Factor Authentication</h4>
                                </div>
                                <ul class="dash-pro-body">

                                </ul>
                            </div>
                        </div> --}}

                        {{-- ? Password update section --}}
                        <div class="col-12">
                            <div class="dash-pro-item mb-30 dashboard-widget">
                                <div class="header">
                                    <h4 class="title">Change Password</h4>
                                </div>
                                <ul class="dash-pro-body">

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
