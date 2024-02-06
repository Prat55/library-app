<div class="col-lg-12 col-xl-12">
    <div class="row">
        @forelse ($books as $book)
            <div class="overflow-hidden col-xl-3 col-lg-3 alert">
                <div class="card item-card">
                    <div class="pb-0 card-body">
                        <div class="text-center zoom">
                            <img src="{{ $book->book_image_path }}" alt="{{ $book->book_name }}"
                                class="img-fluid w-100 br-7" style="height: 350px!important; width:100%!important">
                        </div>
                    </div>
                    <div class="pt-2 pb-4 text-center ps-2 pe-2">
                        <button type="button"
                            class="mb-2 btn btn-md bg-primary-transparent text-primary border-primary quick-view quick-view-btn"
                            value="{{ $book->id }}" title="Quick View">
                            <i class="fa fa-eye font-weight-bold"></i>
                        </button>
                        @if (auth()->user()->role === 'admin' || auth()->user()->role === 'super-admin')
                            <button type="button" class="mb-2 btn btn-md btn-danger ms-2 fs-14" data-toggle="modal"
                                data-target="#rmbook{{ $book->book_token }}" title="Remove Book">
                                <i class="fa fa-trash"></i>
                            </button>
                        @endif
                        @if ($book->featured == 1)
                            <button type="button" class="mb-2 btn btn-md btn-secondary ms-2 fs-14 featured_book"
                                title="Featured Book" value="{{ $book->id }}">
                                <i class="fa fa-star"></i>
                            </button>
                        @else
                            <button type="button" class="mb-2 btn btn-md btn-outline-secondary ms-2 fs-14 feature_book"
                                title="Featured Book" value="{{ $book->id }}">
                                <i class="fa fa-star"></i>
                            </button>
                        @endif
                        <button type="button" class="mb-2 edit-btn btn btn-md btn-outline-primary ms-2 fs-14"
                            value="{{ $book->id }}" title="Edit Book" data-toggle="modal"
                            data-target="#editBook{{ $book->token }}" wire:click='editBook({{ $book->id }})'>
                            <i class="fa fa-edit"></i>
                        </button>
                    </div>

                    <div class="items-center justify-center px-5 overflow-hidden w-100 d-flex">
                        <button type="button" class="mb-2 assign-btn btn btn-md btn-outline-primary ms-2 fs-14 w-100"
                            value="{{ $book->id }}" title="Assign Book">
                            <i class="fa fa-user-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            {{-- * Delete Modal * --}}
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger" wire:click='removeBook({{ $book->id }})'>
                                Delete Permenently
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editBook{{ $book->token }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h3 class="text-center fs-4">Edit Book</h3>
                            <form class="form" wire:submit.prevent='updateBook({{ $this->book_id }})' method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="col-md-12">
                                    <label for="book_name">Book Name</label>
                                    <input type="text" class="form-control" name="book_name" id="book_name"
                                        value="{{ $this->book_name }}" wire:model='book_name'>
                                    @error('book_name')
                                        <span class="text-danger">{{ $message }}</span><br>
                                    @enderror

                                    <label for="author" class="mt-2">Author</label>
                                    <input type="text" class="form-control" name="author" id="author"
                                        value="{{ $this->book_author }}" wire:model='book_author'>
                                    @error('author')
                                        <span class="text-danger">{{ $message }}</span><br>
                                    @enderror

                                    <label for="serial_number" class="mt-2">Serial Number</label>
                                    <input type="text" class="form-control" name="serial_number"
                                        id="serial_number" value="{{ $this->book_serial_number }}"
                                        wire:model='book_serial_number'>
                                    @error('serial_number')
                                        <span class="text-danger">{{ $message }}</span><br>
                                    @enderror

                                    <label for="quantity" class="mt-2">Quantity</label>
                                    <input type="text" class="form-control" name="quantity" id="quantity"
                                        value="{{ $this->book_quantity }}" wire:model='book_quantity'>
                                    @error('book_quantity')
                                        <span class="text-danger">{{ $message }}</span><br>
                                    @enderror

                                    <label for="published" class="mt-2">Published At</label>
                                    <input type="datetime-local" class="form-control" name="published"
                                        id="published" value="{{ $this->published_at }}" wire:model='published_at'>
                                    @error('published_at')
                                        <span class="text-danger">{{ $message }}</span><br>
                                    @enderror

                                    <label for="description" class="mt-2">Description</label>
                                    <textarea name="description" id="description" cols="10" rows="3" class="form-control"
                                        wire:model='book_description'>
                                        {{ $this->book_description }}
                                    </textarea>
                                    @error('book_description')
                                        <span class="text-danger">{{ $message }}</span><br>
                                    @enderror

                                    <label for="book_img" class="mt-2">Book Image</label>
                                    <input type="file" name="book_img" id="book_img"
                                        class="px-4 rounded-md form-control" wire:model='image'>
                                    @error('book_image_path')
                                        <span class="text-danger">{{ $message }}</span><br>
                                    @enderror


                                    <label for="book_pdf" class="mt-2">Book PDF</label>
                                    <input type="file" name="book_pdf" id="book_pdf"
                                        class="px-4 rounded-md form-control" wire:model='pdf'>
                                    @error('book_pdf_path')
                                        <span class="text-danger">{{ $message }}</span><br>
                                    @enderror

                                    <button type="submit" class="mt-2 btn btn-sm btn-primary">Update</button>
                                    <button type="button" wire:click='clear' class="mt-2 btn btn-sm btn-danger"
                                        data-dismiss="modal" aria-label="Close">Cancel
                                    </button>
                                </div>
                            </form>
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
        {{ $books->links() }}
    </div>
</div>
