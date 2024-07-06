<div>
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="mb-0 page-title text-primary">Manage Books</h4>
        </div>

        <ul id="megaError" style="position: absolute;top: 0;right:0;z-index:999">
            @include('backend.message')
        </ul>

        @livewire('search')
    </div>

    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="text-gray-700">
                @if ($search)
                    Searching {{ $search }}
                @endif
            </div>

            <div class="row">
                @forelse ($this->books as $book)
                    <div class="overflow-hidden col-xl-3 col-lg-3 alert">
                        <div class="card item-card">
                            <div class="pb-0 card-body">
                                <div class="text-center zoom position-relative" id="book-info">
                                    <img src="{{ asset('storage/' . $book->book_image_path) }}"
                                        alt="{{ $book->book_name }}" class="img-fluid w-100 br-7"
                                        style="height: 350px!important; width:100%!important">
                                    <div id="cover-info" class="top-0 position-absolute"
                                        style="backdrop-filter: blur(1px);height:100%;width:100%">
                                        <h2 class="pt-2 text-center">{{ $book->book_name }}</h2>

                                        <h3 class="pt-2 text-center">{{ $book->book_author }}</h3>

                                        <span
                                            class="pt-2">Faculty:&nbsp;<span>{{ $book->faculty->faculty_name }}</span>
                                        </span><br>

                                        <span>Quantity:&nbsp;{{ $book->book_quantity }}</span>
                                        <h3>#{{ $book->book_serial_number }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2 pb-4 text-center ps-2 pe-2">
                                @if (auth()->user()->role === 'admin' || auth()->user()->role === 'super-admin')
                                    <button type="button" class="mb-2 btn btn-md btn-danger ms-2 fs-14"
                                        data-toggle="modal" data-target="#rmbook{{ $book->book_token }}"
                                        title="Remove Book">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                @endif
                                @if ($book->featured == 1)
                                    <button type="button" class="mb-2 btn btn-md btn-secondary ms-2 fs-14"
                                        title="Featured Book" wire:click='rmfeaturedBook({{ $book->id }})'>
                                        <i class="fa fa-star"></i>
                                    </button>
                                @else
                                    <button type="button" class="mb-2 btn btn-md btn-outline-secondary ms-2 fs-14"
                                        title="Featured Book" wire:click='featuredBook({{ $book->id }})'>
                                        <i class="fa fa-star"></i>
                                    </button>
                                @endif
                                <a wire:navigate href="/book/edit/{{ $book->book_token }}" type="button"
                                    class="mb-2 btn btn-md btn-outline-primary ms-2 fs-14" title="Edit Book">
                                    <i class="fa fa-edit"></i>
                                </a>
                                {{-- <button type="button" class="mb-2 assign-btn btn btn-md btn-outline-primary ms-2 fs-14"
                                    value="{{ $book->id }}" title="Assign Book">
                                    <i class="fa fa-user-plus"></i>
                                </button> --}}
                            </div>
                        </div>
                    </div>

                    {{-- * Delete Book Modal * --}}
                    <div class="modal fade" id="rmbook{{ $book->book_token }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h3 class="text-center fs-4">Are you sure?</h3>
                                    <span class="text-center text-danger fs-6">
                                        Once deleted will not retrived again
                                    </span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-danger"
                                        wire:click='removeBook({{ $book->id }})'>
                                        Delete Permenently
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="justify-content-center d-flex col-md-12">
                        No books found!
                    </div>
                @endforelse
            </div>
            <div class="d-flex justify-content-end">
                {{ $this->books->links() }}
            </div>
        </div>

    </div>
</div>
