<div>
    <div class="page-header d-flex justify-content-between align-items-center">
        <div class="page-leftheader">
            <h4 class="mb-0 page-title text-primary">Manage Book Requests</h4>
        </div>

        <ul id="megaError" style="position: absolute;top: 0;right:0;z-index:999">
            @include('backend.message')
        </ul>
    </div>

    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="row">
                @forelse ($assignBooks as $req_book)
                    <div class="col-xl-3 col-lg-3 alert">
                        <div class="card item-card">
                            <div class="pb-0 card-body">
                                <div class="text-center zoom">
                                    <img src="{{ asset('storage/' . $req_book->book->book_image_path) }}"
                                        alt="{{ $req_book->book->book_name }}" class="img-fluid w-100 br-7"
                                        style="height: 350px!important; width:100%!important">
                                </div>
                                <div class="w-full mt-3">
                                    <h5>
                                        {{ $req_book->book->book_name }} book is requested by
                                    </h5>
                                    <span>Email:</span>
                                    <span style="font-size: 0.9rem">&nbsp;{{ $req_book->user->email }}</span><br>
                                    <span>Name:</span>
                                    <span>&nbsp;{{ $req_book->user->name }}</span>
                                </div>
                            </div>
                            <div class="pt-2 pb-4 text-center justify-content-around ps-2 pe-2 d-flex">
                                <button type="button"
                                    class="mb-2 btn btn-md bg-danger-transparent text-primary border-primary quick-view reject-book-req"
                                    title="Reject the book request" wire:click="rejectBook({{ $req_book->id }})">
                                    <i class="fa fa-times font-weight-bold"></i>&nbsp;<span>Reject</span>
                                </button>
                                <button type="button"
                                    class="mb-2 btn btn-md bg-success-transparent text-primary border-primary quick-view accept-book-req"
                                    title="Assign the book to user" wire:click="assignBook({{ $req_book->id }})">
                                    <i class="fa fa-check font-weight-bold"></i>&nbsp;<span>Assign</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="justify-content-center d-flex col-md-12">
                        No requests found!
                    </div>
                @endforelse
            </div>
            <div class="d-flex justify-content-end">
                {{ $assignBooks->links() }}
            </div>
        </div>
    </div>
</div>
