<x-app-layout>
    @section('title')
        Showing Information of {{ $user->email }} | {{ $user->name }}
    @endsection

    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="mb-0 page-title text-primary">
                Showing Information of {{ $user->email }} | {{ $user->name }}
            </h4>
        </div>
    </div>

    <!-- Row -->
    <div class="row">
        <div class="col-xl-3 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-center box-widget widget-user">
                        <div class="mx-auto widget-user-image">
                            @if ($user->profile_photo_path)
                                <div style="height: 100px;width: 100px;overflow: hidden;border-radius: 100%">
                                    <img id="profile_img" class="rounded-circle"
                                        src="/profile-img/{{ $user->profile_photo_path }}" alt="{{ $user->name }}"
                                        width="100%" height="100%">
                                </div>
                            @else
                                <img id="profile_img" class="rounded-circle"
                                    src="{{ asset('user-assets/images/dashboard/user.jpg') }}" alt="user">
                            @endif
                        </div>
                        <div class="mt-4 ms-sm-5 ms-0">
                            <h4 class="mb-2 pro-user-username font-weight-bold">{{ $user->name }}</h4>
                            <div>
                                <span class="badge fs-13 bg-primary-transparent border-primary me-2">
                                    {{ $user->role == 'user' ? 'Student' : 'Teacher' }}
                                </span>
                                <span class="badge fs-13 bg-success-transparent text-success border-success">
                                    {{ $user->faculty->faculty_name }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header ">
                    <div class="card-title">
                        Library Card
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        @empty($user->library_card)
                            <div>
                                <span class="">
                                    Library card is not uploaded yet
                                </span>
                            </div>
                        @else
                            <div class="d-flex align-items-center justify-content-around">
                                <div class="p-2" style="max-height: 350px;overflow:hidden;width:50%;">
                                    <img src="{{ asset('storage/' . $user->library_card) }}" alt="{{ $user->name }}"
                                        style="max-height: 350px!important;width:100%;">
                                </div>
                                <div>
                                    <h2><span><b>Name:</b></span> <span>{{ $user->name }}</span> </h2><br>
                                    <h2><span><b>Email:</b></span> <span>{{ $user->email }}</span> </h2><br>
                                    <h2><span><b>Status:</b></span> <span
                                            class="{{ $user->status == 'active' ? 'text-success' : 'text-danger' }} uppercase">{{ $user->status }}</span>
                                    </h2>
                                </div>
                            </div>
                        @endempty
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header ">
                    <div class="card-title">Currently issued Book</div>
                </div>
                <div class="card-body">
                    <div>
                        @php
                            $issuedBook = App\Models\AssignBook::where('user_id', $user->id)->first();
                        @endphp

                        @if ($issuedBook)
                            <ul class="dash-pro-body d-flex align-items-center justify-content-around">
                                <a class="p-relative">
                                    <img src="{{ asset('storage/' . $issuedBook->book->book_image_path) }}"
                                        alt="{{ $issuedBook->book->book_name }}" height="380px" width="220px">

                                    @if ($issuedBook->book->book_pdf_path)
                                        <div>
                                            <a href="{{ $issuedBook->book->book_pdf_path ? asset('storage/' . $issuedBook->book->book_pdf_path) : '#0' }}"
                                                @if ($issuedBook->book->book_pdf_path) download @endif class="rating">
                                                <i class="fa fa-file-pdf fa-lg"></i>
                                            </a>
                                        </div>
                                    @endif
                                </a><br>

                                <a>
                                    <p class="">Book Title:
                                        {{ $issuedBook->book->book_name }}
                                    </p><br>
                                    @if ($issuedBook->start_date && $issuedBook->end_date)
                                        @php
                                            $issuedDate = Carbon\Carbon::parse($issuedBook->start_date)->format(
                                                'Y-m-d',
                                            );

                                            $returnDate = Carbon\Carbon::parse($issuedBook->end_date)->format('Y-m-d');
                                        @endphp
                                        <p>Issued Date: <span>{{ $issuedDate }}</span></p><br>
                                        <p>Return Date: <span>{{ $returnDate }}&nbsp;</span></p>
                                    @endif
                                    @if ($issuedBook->status === 'request')
                                        <span class="text-red-500">Collect your book from library</span>
                                    @endif

                                </a>
                            </ul>
                        @else
                            <span>No book issued to this user</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
</x-app-layout>
