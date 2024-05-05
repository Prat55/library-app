 <div>
     <div class="page-header d-flex justify-content-between align-items-center">
         <div class="page-leftheader">
             <h4 class="mb-0 page-title text-primary">Issued Books</h4>
         </div>
         <ul id="megaError" style="position: absolute;top: 0;right:0;z-index:999">
             @include('backend.message')
         </ul>
         {{-- <div class="d-flex justify-content-center align-items-center">
             <input type="text" class="rounded form-control" placeholder="Serach here...">
             <i class="cursor-pointer fa-solid fa-magnifying-glass ps-3"></i>
         </div> --}}
     </div>

     <div class="row">
         <div class="col-lg-12 col-xl-12">
             <div class="row">
                 @forelse ($issuedBooks as $book)
                     <div class="col-xl-3 col-lg-3 alert">
                         <div class="card item-card">
                             <div class="pb-0 card-body">
                                 <div class="text-center zoom">
                                     <img src="{{ asset('storage/' . $book->book->book_image_path) }}"
                                         alt="{{ $book->book->book_name }}" class="img-fluid w-100 br-7"
                                         style="height: 350px!important; width:100%!important">
                                 </div>
                                 <div class="w-full mt-3">
                                     <h5>
                                         {{ $book->book->book_name }} book is assign to
                                     </h5>
                                     <span>Email:</span>
                                     <span style="font-size: 0.9rem">&nbsp;{{ $book->user->email }}</span><br>
                                     <span>Name:</span>
                                     <span>&nbsp;{{ $book->user->name }}</span><br>

                                     <span>Return In:</span>
                                     <span>&nbsp;{{ $book->end_date }} @if ($book->end_date == $today)
                                             <span class="text-center text-red-500">
                                                 Today is the last day to return
                                             </span>
                                         @elseif ($book->end_date < $today)
                                             <span class="text-center text-red-500">Overdue</span>
                                         @endif
                                     </span>
                                 </div>
                             </div>
                             <div class="pt-2 pb-4 text-center justify-content-around ps-2 pe-2 d-flex">
                                 <button type="button"
                                     class="mb-2 btn btn-md bg-success-transparent text-primary border-primary"
                                     title="Return the book" wire:click="returnBook({{ $book->id }})">
                                     <i class="fa fa-rotate-left font-weight-bold"></i>&nbsp;
                                     <span>Return the book</span>
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
                 {{ $issuedBooks->links() }}
             </div>
         </div>
     </div>
 </div>
