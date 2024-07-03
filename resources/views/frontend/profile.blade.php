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
                                        <img id="profile_img" src="{{ asset('user-assets/images/dashboard/user.jpg') }}"
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
                                <span class="username">
                                    <a href="mailto: info@library.com" class="__cf_email__">
                                        {{ auth()->user()->email }}
                                    </a>
                                </span><br>

                                <span class="username">
                                    {{ auth()->user()->faculty_id ? auth()->user()->faculty->faculty_name : '' }}
                                </span>

                                @if (auth()->user()->role === 'teacher')
                                    <span class="username">
                                        Teacher
                                    </span>
                                @elseif (auth()->user()->role === 'admin' || auth()->user()->role === 'super-admin')
                                    <span class="username">
                                        Admin
                                    </span>
                                @else
                                    <span class="username">
                                        Student
                                    </span>
                                @endif
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
                                <div id="issued-books">
                                    @if ($issuedBook)
                                        <ul class="dash-pro-body">
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
                                                <p>Return Date: <span>{{ $issuedBook->end_date }}&nbsp;</span></p>
                                            @endif
                                            @if ($issuedBook->status === 'request')
                                                <span class="text-red-500">Collect your book from library</span>
                                            @endif

                                        </ul>
                                        <ul class="d-flex justify-content-center align-items-center" id="fineCal">
                                            <div>
                                                <form action="" method="post">
                                                    @php
                                                        $fine = App\Models\Fine::where('user_id', auth()->user()->id)
                                                            ->where('book_id', $issuedBook->book_id)
                                                            ->first();

                                                        if ($issuedBook) {
                                                            $today = Carbon\Carbon::now();
                                                            $endDate = Carbon\Carbon::parse($issuedBook->end_date);

                                                            $overdueDays = $today->diffInDays($endDate);

                                                            $totalFine = $overdueDays * 100;

                                                            if ($endDate < $today) {
                                                                if (!$fine && $fine->status != 'paid') {
                                                                    $fine = new App\Models\Fine();
                                                                    $fine->user_id = auth()->user()->id;
                                                                    $fine->book_id = $issuedBook->book_id;
                                                                    $fine->overdue_days = $overdueDays;
                                                                    $fine->total_amount = $totalFine;
                                                                    $fine->save();
                                                                }
                                                            }
                                                        }
                                                    @endphp

                                                    @if ($fine->status === 'unpaid')
                                                        <h3>Fine</h3>
                                                        <hr>

                                                        <table>
                                                            <tr>
                                                                <th>Book Name:&nbsp;</th>
                                                                <td>{{ $issuedBook->book->book_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Overdued:&nbsp;</th>
                                                                <td>
                                                                    @if ($overdueDays != '0' && $overdueDays != '1')
                                                                        {{ $overdueDays . ' days ago' }}
                                                                    @elseif ($overdueDays == '1')
                                                                        {{ $overdueDays . ' day ago' }}
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Total:&nbsp;</th>
                                                                <td>{{ '₹' . $totalFine }}</td>
                                                            </tr>
                                                        </table><br>
                                                        <tr>
                                                            <button type="submit"
                                                                class="btn btn-sm btn-outline-primary">
                                                                Pay Now
                                                            </button>
                                                        </tr>
                                                    @endif
                                                </form>
                                            </div>
                                        </ul>
                                    @else
                                        <span>No book added!</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- * User account information section * --}}
                        <div class="col-12">
                            <div class="dash-pro-item mb-30 dashboard-widget">
                                <div class="header">
                                    <h4 class="title">Library Card</h4>
                                </div>
                                <ul class="dash-pro-body">
                                    @empty(auth()->user()->library_card)
                                        <form action="{{ route('user.library-card-upload') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div>
                                                <span class="text-warning">
                                                    Note: Please upload an image that is legitimate.
                                                </span>
                                                <div class="p-2 cursor-pointer d-flex justify-content-center align-items-center"
                                                    style="height: 220px;overflow:hidden;border: 2px dotted #d5d5d5"
                                                    id="library_card_btn">
                                                    <label for="library_card" class="library_card-edit">
                                                        <div class="text-center">
                                                            <h3>Upload Library Card Image Here</h3>
                                                            <i class="fa fa-image fa-3xl"></i>
                                                        </div>
                                                    </label>

                                                </div><br>

                                                <input type="file"
                                                    class="hidden form-control w-full @error('library_card') is-invalid @enderror"
                                                    name="library_card" id="library_card">
                                                @error('library_card')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div><br>


                                            <div>
                                                <button class="btn btn-sm btn-outline-primary" type="submit">
                                                    Update
                                                </button>
                                            </div>
                                        </form>
                                    @else
                                        <div>
                                            <div class="p-2" style="max-height: 350px;overflow:hidden">
                                                <img src="{{ asset('storage/' . auth()->user()->library_card) }}"
                                                    alt="{{ auth()->user()->name }}"
                                                    style="height: 350px!important;width:100%;">
                                            </div>
                                        </div><br>
                                    @endempty
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
                                            <h3>Faculty
                                                {{ auth()->user()->faculty_id ? '' : "(Make sure before selecting. You can't modify this.)" }}
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
                                    <form action="{{ route('password.update') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div>
                                            <label for="currentPassword">Current Password</label>
                                            <input type="password" name="currentPassword" id="currentPassword"
                                                class="form-control @error('currentPassword') is-invalid @enderror">
                                            @error('currentPassword')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div><br>

                                        <div>
                                            <label for="newPassword">New Password</label>
                                            <input type="password" name="newPassword" id="newPassword"
                                                class="form-control @error('newPassword') is-invalid @enderror">
                                            @error('newPassword')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div><br>

                                        <div>
                                            <label for="confirmNewPassword">Confirm New Password</label>
                                            <input type="password" name="confirmNewPassword" id="confirmNewPassword"
                                                class="form-control @error('confirmNewPassword') is-invalid @enderror">
                                            @error('confirmNewPassword')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div><br>

                                        <button class="btn btn-outline-secondary">
                                            Update
                                        </button>
                                    </form>
                                </ul>
                            </div>
                        </div>

                        {{-- ? Delete account section --}}
                        <div class="col-12">
                            <div class="dash-pro-item mb-30 dashboard-widget">
                                <div class="header">
                                    <h4 class="title">Delete Account</h4>
                                </div>
                                <ul class="dash-pro-body">
                                    <form method="POST" action="{{ route('user.delete') }}">
                                        @csrf

                                        <div>
                                            <button type="submit" class="mt-2 btn btn-sm btn-outline-danger">
                                                Delete Account
                                            </button>
                                        </div>
                                    </form>
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
