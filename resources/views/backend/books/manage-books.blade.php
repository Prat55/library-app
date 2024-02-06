<x-app-layout>
    @section('title')
        Manage Books
    @endsection

    <div>
        <div class="page-header">
            <div class="page-leftheader">
                <h4 class="mb-0 page-title text-primary">Manage Books</h4>
            </div>

            <ul id="megaError" style="position: absolute;top: 0;right:0;z-index:999">
                @include('backend.message')
            </ul>
        </div>

        <div class="row">
            @livewire('manage-book')
        </div>

        {{-- ? Quick view modal ? --}}
        <div class="modal fade" id="quickview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title book-title" id="exampleModalLongTitle"></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="fs-4" style="color: #fff">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12 d-flex">
                            <div class="col-md-6">
                                <img src="" class="bookimg" alt="bookimg">
                            </div>
                            <div class="col-md-6">
                                <h4 class="author"></h4>
                                <div class="gap-2 justify-content-around col-md-12 d-flex">
                                    <h5 class="isbnNo" style="font-size: 0.9rem; margin-left: -16px;"></h5>
                                    <h5 class="quantity" style="font-size: 0.9rem"></h5>
                                </div>

                                <div class="col-md-12" style="font-size: 0.9rem; margin-left: -13px;">
                                    <h6 class="category">
                                    </h6>
                                </div>
                                <p class="mt-3 text-justify description">

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
