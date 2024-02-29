<x-guest-layout>
    @section('title')
        Home
    @endsection

    <!--============= Banner Section Starts Here =============-->
    <section class="banner-section bg_img" data-background="{{ asset('user-assets/images/banner/banner-bg-1.png') }}">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 col-xl-6">
                    <div class="banner-content cl-white">
                        <h5 class="cate">Next Generation Library</h5>
                        <h1 class="title"><span class="d-xl-block">Get Your</span> Favourite Books!</h1>
                        <p>
                            Discover, Explore, and Dive into Knowledge with Our Library Management System. Seamlessly
                            Organize, Access, and Share Resources for a Smarter Learning Experience.
                        </p>

                        @guest
                            <a href="{{ route('register') }}" class="custom-button yellow btn-large">Get Started</a>
                        @endguest
                    </div>
                </div>
                <div class="d-none d-lg-block col-lg-6">
                    <div class="banner-thumb-2">
                        <img src="{{ asset('user-assets/images/about/hero-img.png') }}" alt="banner" height="500px">
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-shape d-none d-lg-block">
            <img src="{{ asset('user-assets/css/img/banner-shape.png') }}" alt="css">
        </div>
    </section>
    <!--============= Banner Section Ends Here =============-->


    <div class="browse-section ash-bg">
        <!--============= Book Show Section Starts Here =============-->
        <section class="car-auction-section padding-bottom padding-top pos-rel oh" id="books">
            <div class="car-bg"><img src="{{ asset('user-assets/images/banner/6166234_17450.jpg') }}" alt="book">
            </div>
            <div class="container">
                <div class="section-header-3">
                    <div class="left">
                        <div class="thumb">
                            <i class="fa fa-book" style="font-size: 3rem; color: #f6659c"></i>
                        </div>
                        <div class="title-area">
                            <h2 class="title" style="color: #fff">Bsc CS</h2>
                        </div>
                    </div>
                    {{-- <a href="#0" class="normal-button">View All</a> --}}
                </div>
                <div class="row justify-content-center mb-30-none">
                    @forelse ($bsccsbooks as $book)
                        <div class="col-sm-10 col-md-6 col-lg-4">
                            <div class="auction-item-2">
                                <div class="auction-thumb">
                                    <a href="@if ($book->book_pdf_path) {{ asset('storage/' . $book->book_pdf_path) }}
                                    @else #0 @endif"
                                        @if ($book->book_pdf_path) download @endif>
                                        <img src="{{ asset('storage/' . $book->book_image_path) }}"
                                            alt="{{ $book->book_name }}" height="380px" width="200px">
                                    </a>
                                    <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                    {{-- <a href="#0" class="bid"><i class="flaticon-auction"></i></a> --}}
                                </div>
                                <div class="auction-content">
                                    <h6 class="title">
                                        <span style="text-transform: capitalize">{{ $book->book_name }}</span>
                                        <span class="text-success" style="text-transform: capitalize"> -
                                            {{ $book->author }}</span>
                                    </h6>
                                    <div class="bid-area">
                                        <div class="bid-amount">
                                            <div class="icon">
                                                <i class="fa fa-book"></i>
                                            </div>
                                            <div class="amount-content">
                                                <div class="current">Available Books</div>
                                                <div class="amount">{{ $book->book_quantity }}</div>
                                            </div>
                                        </div>
                                        <div class="bid-amount">
                                            <div class="icon">
                                                <i class="fa fa-plus"></i>
                                            </div>
                                            <div class="amount-content">
                                                <div class="current">Book Now</div>
                                                <div class="amount">7 days</div>
                                            </div>
                                        </div>
                                    </div>

                                    @if ($book->book_quantity == 0)
                                        <div class="mt-3 text-center">
                                            <button type="button" class="btn btn-sm btn-outline-primary">
                                                Wait untill it's available
                                            </button>
                                        </div>
                                    @else
                                        <div class="mt-3 text-center">
                                            {{-- <a href="#0" class="custom-button">Book Now</a> --}}
                                            <form action="/booknow/{{ $book->token }}" method="post">
                                                @csrf

                                                <button type="submit" class="btn btn-sm btn-outline-primary"
                                                    id="bookNow">
                                                    Book Now
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12">
                            <h4 class="text-center">No Books added</h4>
                        </div>
                    @endforelse
                </div>
                {{ $bsccsbooks->links() }}
            </div>
        </section>
        <!--============= Book Show Section Ends Here =============-->
    </div>


    <!--============= Book Show Section Starts Here =============-->
    <section class="jewelry-auction-section padding-bottom padding-top pos-rel">
        <div class="jewelry-bg d-none d-xl-block">
            <img src="{{ asset('user-assets/images/banner/34666011_5_asfasw112.jpg') }}" alt="jewelry">
        </div>
        <div class="container">
            <div class="section-header-3">
                <div class="left">
                    <div class="thumb">
                        <i class="fa fa-book" style="font-size: 3rem; color: #f6659c"></i>
                    </div>
                    <div class="title-area">
                        <h2 class="title">BMS</h2>
                        {{-- <p>Online Book Shows where you can bid now and save money</p> --}}
                    </div>
                </div>
                {{-- <a href="#0" class="normal-button">View All</a> --}}
            </div>
            <div class="row justify-content-center mb-30-none">
                @forelse ($bmsbooks as $book)
                    <div class="col-sm-10 col-md-6 col-lg-4">
                        <div class="auction-item-2">
                            <div class="auction-thumb">
                                <a href="@if ($book->book_pdf_path) {{ asset('storage/' . $book->book_pdf_path) }}
                                    @else #0 @endif"
                                    @if ($book->book_pdf_path) download @endif>
                                    <img src="{{ asset('storage/' . $book->book_image_path) }}"
                                        alt="{{ $book->book_name }}" height="380px" width="200px">
                                </a>
                                <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                {{-- <a href="#0" class="bid"><i class="flaticon-auction"></i></a> --}}
                            </div>
                            <div class="auction-content">
                                <h6 class="title">
                                    <span style="text-transform: capitalize">{{ $book->book_name }}</span>
                                    <span class="text-success" style="text-transform: capitalize"> -
                                        {{ $book->author }}</span>
                                </h6>
                                <div class="bid-area">
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="fa fa-book"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Available Books</div>
                                            <div class="amount">{{ $book->book_quantity }}</div>
                                        </div>
                                    </div>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="fa fa-plus"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Book Now</div>
                                            <div class="amount">7 days</div>
                                        </div>
                                    </div>
                                </div>

                                @if ($book->book_quantity == 0)
                                    <div class="mt-3 text-center">
                                        <button type="button" class="btn btn-sm btn-outline-primary">
                                            Wait untill it's available
                                        </button>
                                    </div>
                                @else
                                    <div class="mt-3 text-center">
                                        {{-- <a href="#0" class="custom-button">Book Now</a> --}}
                                        <form action="/booknow/{{ $book->token }}" method="post">
                                            @csrf

                                            <button type="submit" class="btn btn-sm btn-outline-primary"
                                                id="bookNow">
                                                Book Now
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h4 class="text-center">No Books added</h4>
                    </div>
                @endforelse
            </div>
            {{ $bmsbooks->links() }}
        </div>
    </section>
    <!--============= Book Show Section Ends Here =============-->


    @if (!auth()->check())
        <!--============= User Register Section Starts Here =============-->
        <section class="call-in-section padding-top pt-max-xl-0">
            <div class="container">
                <div class="call-wrapper cl-white bg_img"
                    data-background="{{ asset('user-assets/images/call-in/call-bg.png') }}">
                    <div class="section-header">
                        <h3 class="title">Register for Free & Start Bidding Now!</h3>
                        <p>From cars to diamonds to iPhones, we have it all.</p>
                    </div>
                    <a href="{{ route('register') }}" class="custom-button white">Register</a>
                </div>
            </div>
        </section>
        <!--============= User Register Section Ends Here =============-->
    @endif


    <!--============= Books Show Section Starts Here =============-->
    <section class="watches-auction-section padding-bottom padding-top">
        <div class="container">
            <div class="section-header-3">
                <div class="left">
                    <div class="thumb">
                        <i class="fa fa-book" style="font-size: 3rem; color: #f6659c"></i>
                    </div>
                    <div class="title-area">
                        <h2 class="title">Bsc IT</h2>
                    </div>
                </div>
                {{-- <a href="#0" class="normal-button">View All</a> --}}
            </div>
            <div class="row justify-content-center mb-30">
                @forelse ($bscitbooks as $book)
                    <div class="col-sm-10 col-md-6 col-lg-4">
                        <div class="auction-item-2">
                            <div class="auction-thumb">
                                <a href="@if ($book->book_pdf_path) {{ asset('storage/' . $book->book_pdf_path) }}
                                    @else #0 @endif"
                                    @if ($book->book_pdf_path) download @endif>
                                    <img src="{{ asset('storage/' . $book->book_image_path) }}"
                                        alt="{{ $book->book_name }}" height="380px" width="200px">
                                </a>
                                <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                {{-- <a href="#0" class="bid"><i class="flaticon-auction"></i></a> --}}
                            </div>
                            <div class="auction-content">
                                <h6 class="title">
                                    <span style="text-transform: capitalize">{{ $book->book_name }}</span>
                                    <span class="text-success" style="text-transform: capitalize"> -
                                        {{ $book->author }}</span>
                                </h6>
                                <div class="bid-area">
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="fa fa-book"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Available Books</div>
                                            <div class="amount">{{ $book->book_quantity }}</div>
                                        </div>
                                    </div>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="fa fa-plus"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Book Now</div>
                                            <div class="amount">7 days</div>
                                        </div>
                                    </div>
                                </div>

                                @if ($book->book_quantity == 0)
                                    <div class="mt-3 text-center">
                                        <button type="button" class="btn btn-sm btn-outline-primary">
                                            Wait untill it's available
                                        </button>
                                    </div>
                                @else
                                    <div class="mt-3 text-center">
                                        {{-- <a href="#0" class="custom-button">Book Now</a> --}}
                                        <form action="/booknow/{{ $book->token }}" method="post">
                                            @csrf

                                            <button type="submit" class="btn btn-sm btn-outline-primary"
                                                id="bookNow">
                                                Book Now
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h4 class="text-center">No Books added</h4>
                    </div>
                @endforelse
            </div>
            {{ $bscitbooks->links() }}
        </div>
    </section>
    <!--============= Books Show Section Ends Here =============-->


    <!--============= Featured Book Section Starts Here =============-->
    <section class="popular-auction padding-top pos-rel">
        <div class="popular-bg bg_img"
            data-background="{{ asset('user-assets/images/auction/popular/popular-bg.png') }}">
        </div>
        <div class="container">
            <div class="section-header cl-white">
                <span class="cate">You will see some featured books here</span>
                <h2 class="title">Featured Books</h2>
                {{-- <p>Bid and win great deals,Our auction process is simple, efficient, and transparent.</p> --}}
            </div>
            <div class="popular-auction-wrapper">
                <div class="row justify-content-center mb-30-none">
                    @forelse ($featured as $item)
                        <div class="col-lg-6">
                            <div class="auction-item-3">
                                <div class="auction-thumb" style="height:320px; width:248px; ">
                                    <a href="#0"><img src="/books/{{ $item->book_img }}" alt="popular"
                                            height="100%" width="100%"></a>
                                    <a href="#0" class="bid"><i class="fa fa-eye"></i></a>
                                </div>
                                <div class="auction-content">
                                    <h6 class="title">
                                        <a href="#0">{{ $item->book_name }}</a>
                                    </h6>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="fa fa-book"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Available</div>
                                            <div class="amount">{{ $item->book_quantity }}</div>
                                        </div>
                                    </div>
                                    <div class="bids-area">
                                        Author : <span class="total-bids">{{ $item->author }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-lg-12">
                            <h3 class="text-center">No featured books available</h3>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <!--============= Featured Book Section Ends Here =============-->


    <!--============= Books Show  Section Starts Here =============-->
    <section class="coins-and-bullion-auction-section padding-bottom padding-top pos-rel pb-max-xl-0">
        <div class="jewelry-bg d-none d-xl-block"><img
                src="{{ asset('user-assets/images/banner/35055146_8275340.jpg') }}" alt="coin">
        </div>
        <div class="container">
            <div class="section-header-3">
                <div class="left">
                    <div class="thumb">
                        <i class="fa fa-book" style="font-size: 3rem; color: #f6659c"></i>
                    </div>
                    <div class="title-area">
                        <h2 class="title" style="color: #fff">B Com</h2>
                        {{-- <p>Discover rare, foreign, & ancient coins that are worth collecting</p> --}}
                    </div>
                </div>
                {{-- <a href="#0" class="normal-button">View All</a> --}}
            </div>
            <div class="row justify-content-center mb-30-none">
                @forelse ($bcombooks as $book)
                    <div class="col-sm-10 col-md-6 col-lg-4">
                        <div class="auction-item-2">
                            <div class="auction-thumb">
                                <a href="@if ($book->book_pdf_path) {{ asset('storage/' . $book->book_pdf_path) }}
                                    @else #0 @endif"
                                    @if ($book->book_pdf_path) download @endif>
                                    <img src="{{ asset('storage/' . $book->book_image_path) }}"
                                        alt="{{ $book->book_name }}" height="380px" width="200px">
                                </a>
                                <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                {{-- <a href="#0" class="bid"><i class="flaticon-auction"></i></a> --}}
                            </div>
                            <div class="auction-content">
                                <h6 class="title">
                                    <span style="text-transform: capitalize">{{ $book->book_name }}</span>
                                    <span class="text-success" style="text-transform: capitalize"> -
                                        {{ $book->author }}</span>
                                </h6>
                                <div class="bid-area">
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="fa fa-book"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Available Books</div>
                                            <div class="amount">{{ $book->book_quantity }}</div>
                                        </div>
                                    </div>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="fa fa-plus"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Book Now</div>
                                            <div class="amount">7 days</div>
                                        </div>
                                    </div>
                                </div>

                                @if ($book->book_quantity == 0)
                                    <div class="mt-3 text-center">
                                        <button type="button" class="btn btn-sm btn-outline-primary">
                                            Wait untill it's available
                                        </button>
                                    </div>
                                @else
                                    <div class="mt-3 text-center">
                                        {{-- <a href="#0" class="custom-button">Book Now</a> --}}
                                        <form action="/booknow/{{ $book->token }}" method="post">
                                            @csrf

                                            <button type="submit" class="btn btn-sm btn-outline-primary"
                                                id="bookNow">
                                                Book Now
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h4 class="text-center">No Books added</h4>
                    </div>
                @endforelse
            </div>
            {{ $bcombooks->links() }}
        </div>
    </section>
    <!--============= Books Show  Section Ends Here =============-->


    <!--============= Books Show  Section Starts Here =============-->
    <section class="coins-and-bullion-auction-section padding-bottom padding-top pos-rel pb-max-xl-0">
        <div class="jewelry-bg d-none d-xl-block"><img
                src="{{ asset('user-assets/images/banner/9461170_4196401.jpg') }}" alt="coin">
        </div>
        <div class="container">
            <div class="section-header-3">
                <div class="left">
                    <div class="thumb">
                        <i class="fa fa-book" style="font-size: 3rem; color: #f6659c"></i>
                    </div>
                    <div class="title-area">
                        <h2 class="title">BAF</h2>
                        {{-- <p>Discover rare, foreign, & ancient coins that are worth collecting</p> --}}
                    </div>
                </div>
                {{-- <a href="#0" class="normal-button">View All</a> --}}
            </div>
            <div class="row justify-content-center mb-30-none">
                @forelse ($bafbooks as $book)
                    <div class="col-sm-10 col-md-6 col-lg-4">
                        <div class="auction-item-2">
                            <div class="auction-thumb">
                                <a href="@if ($book->book_pdf_path) {{ asset('storage/' . $book->book_pdf_path) }}
                                    @else #0 @endif"
                                    @if ($book->book_pdf_path) download @endif>
                                    <img src="{{ asset('storage/' . $book->book_image_path) }}"
                                        alt="{{ $book->book_name }}" height="380px" width="200px">
                                </a>
                                <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                {{-- <a href="#0" class="bid"><i class="flaticon-auction"></i></a> --}}
                            </div>
                            <div class="auction-content">
                                <h6 class="title">
                                    <span style="text-transform: capitalize">{{ $book->book_name }}</span>
                                    <span class="text-success" style="text-transform: capitalize"> -
                                        {{ $book->author }}</span>
                                </h6>
                                <div class="bid-area">
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="fa fa-book"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Available Books</div>
                                            <div class="amount">{{ $book->book_quantity }}</div>
                                        </div>
                                    </div>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="fa fa-plus"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Book Now</div>
                                            <div class="amount">7 days</div>
                                        </div>
                                    </div>
                                </div>

                                @if ($book->book_quantity == 0)
                                    <div class="mt-3 text-center">
                                        <button type="button" class="btn btn-sm btn-outline-primary">
                                            Wait untill it's available
                                        </button>
                                    </div>
                                @else
                                    <div class="mt-3 text-center">
                                        {{-- <a href="#0" class="custom-button">Book Now</a> --}}
                                        <form action="/booknow/{{ $book->token }}" method="post">
                                            @csrf

                                            <button type="submit" class="btn btn-sm btn-outline-primary"
                                                id="bookNow">
                                                Book Now
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h4 class="text-center">No Books added</h4>
                    </div>
                @endforelse
            </div>
            {{ $bcombooks->links() }}
        </div>
    </section>
    <!--============= Books Show  Section Ends Here =============-->

    <!--============= Books Show  Section Starts Here =============-->
    <section class="coins-and-bullion-auction-section padding-bottom padding-top pos-rel pb-max-xl-0">
        <div class="jewelry-bg d-none d-xl-block"><img
                src="{{ asset('user-assets/images/banner/6972727_23787.jpg') }}" alt="coin">
        </div>
        <div class="container">
            <div class="section-header-3">
                <div class="left">
                    <div class="thumb">
                        <i class="fa fa-book" style="font-size: 3rem; color: #f6659c"></i>
                    </div>
                    <div class="title-area">
                        <h2 class="title">BBI</h2>
                        {{-- <p>Discover rare, foreign, & ancient coins that are worth collecting</p> --}}
                    </div>
                </div>
                {{-- <a href="#0" class="normal-button">View All</a> --}}
            </div>
            <div class="row justify-content-center mb-30-none">
                @forelse ($bbibooks as $book)
                    <div class="col-sm-10 col-md-6 col-lg-4">
                        <div class="auction-item-2">
                            <div class="auction-thumb">
                                <a href="@if ($book->book_pdf_path) {{ asset('storage/' . $book->book_pdf_path) }}
                                    @else #0 @endif"
                                    @if ($book->book_pdf_path) download @endif>
                                    <img src="{{ asset('storage/' . $book->book_image_path) }}"
                                        alt="{{ $book->book_name }}" height="380px" width="200px">
                                </a>
                                <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                {{-- <a href="#0" class="bid"><i class="flaticon-auction"></i></a> --}}
                            </div>
                            <div class="auction-content">
                                <h6 class="title">
                                    <span style="text-transform: capitalize">{{ $book->book_name }}</span>
                                    <span class="text-success" style="text-transform: capitalize"> -
                                        {{ $book->author }}</span>
                                </h6>
                                <div class="bid-area">
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="fa fa-book"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Available Books</div>
                                            <div class="amount">{{ $book->book_quantity }}</div>
                                        </div>
                                    </div>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="fa fa-plus"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Book Now</div>
                                            <div class="amount">7 days</div>
                                        </div>
                                    </div>
                                </div>

                                @if ($book->book_quantity == 0)
                                    <div class="mt-3 text-center">
                                        <button type="button" class="btn btn-sm btn-outline-primary">
                                            Wait untill it's available
                                        </button>
                                    </div>
                                @else
                                    <div class="mt-3 text-center">
                                        {{-- <a href="#0" class="custom-button">Book Now</a> --}}
                                        <form action="/booknow/{{ $book->token }}" method="post">
                                            @csrf

                                            <button type="submit" class="btn btn-sm btn-outline-primary"
                                                id="bookNow">
                                                Book Now
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h4 class="text-center">No Books added</h4>
                    </div>
                @endforelse
            </div>
            {{ $bcombooks->links() }}
        </div>
    </section>
    <!--============= Books Show  Section Ends Here =============-->
</x-guest-layout>
