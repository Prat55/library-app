<div class="col-sm-10 col-md-6 col-lg-4">
    <div class="auction-item-2">
        <div class="auction-thumb">
            <a>
                <img src="{{ asset('storage/' . $book->book_image_path) }}" alt="{{ $book->book_name }}" height="380px"
                    width="200px" class="overflow-hidden">
            </a>
            @if ($book->book_pdf_path)
                <a href="{{ $book->book_pdf_path ? asset('storage/' . $book->book_pdf_path) : '#0' }}"
                    @if ($book->book_pdf_path) download @endif class="rating"><i
                        class="fa fa-file-pdf fa-lg"></i></a>
            @endif
            {{-- <a href="#0" class="bid"><i class="flaticon-auction"></i></a> --}}
        </div>
        <div class="auction-content">
            <h6 class="title">
                <span style="text-transform: capitalize">{{ $book->book_name }}</span>
                <span class="text-success" style="text-transform: capitalize"> -
                    {{ $book->book_author }}</span>
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
                {{-- @livewire('book-now', ['bookId', $book->id]) --}}
                <livewire:book-now :bookId='$book->id' />
            @endif
        </div>
    </div>
</div>
