 <div>
     <div class="page-header d-flex justify-content-between align-items-center">
         <div class="page-leftheader">
             <h4 class="mb-0 page-title text-primary">Issued Books</h4>
         </div>
         <ul id="megaError" style="position: absolute;top: 0;right:0;z-index:999">
             @include('backend.message')
         </ul>

         @livewire('search-by-id')
     </div>

     <div class="row">
         <div class="col-lg-12 col-xl-12">
             <div class="row">
                 @forelse ($issuedBooks as $ibook)
                     @php
                         finecalculation($ibook->book_id, $ibook->user_id, $ibook->end_date);
                     @endphp

                     <div class="col-xl-3 col-lg-3 alert">
                         <div class="card item-card">
                             <div class="pb-0 card-body">
                                 <div class="text-center zoom">
                                     <img src="{{ asset('storage/' . $ibook->book->book_image_path) }}"
                                         alt="{{ $ibook->book->book_name }}" class="img-fluid w-100 br-7"
                                         style="height: 350px!important; width:100%!important">
                                 </div>
                                 <div class="w-full mt-3">
                                     <h5>
                                         <b>{{ $ibook->book->book_name }}</b> book is assigned to
                                     </h5>
                                     <span><b>Email:</b></span>
                                     <span style="font-size: 0.9rem">&nbsp;{{ $ibook->user->email }}</span><br>
                                     <span><b>Name:</b></span>
                                     <span>&nbsp;{{ $ibook->user->name }}</span><br>
                                     @if ($ibook->re_assign_count > 0)
                                         <span><b>Re Assign:</b></span>
                                         <span>&nbsp;{{ $ibook->re_assign_count }}</span><br>
                                     @endif
                                     <span><b>Issued On:</b></span>
                                     <span>&nbsp;{{ $ibook->start_date }}</span><br>
                                     <span><b>Return In:</b></span>
                                     <span>
                                         @php
                                             $today = Carbon\Carbon::now();
                                             $endDate = Carbon\Carbon::parse($ibook->end_date);

                                             $countOverdueDays = $today->diffInDays($endDate);
                                             $overdueDays = -number_format($countOverdueDays);
                                             $countTotalDays = $endDate->diffInDays($today);
                                             $totalDays = -number_format($countTotalDays);
                                         @endphp
                                         &nbsp;
                                         @if ($endDate == $today)
                                             <span class="text-center text-red-500">
                                                 Today is the last day of return
                                             </span>
                                         @elseif ($endDate < $today)
                                             <span class="text-center text-red-500">Overdued
                                                 @if ($overdueDays != '0' && $overdueDays != '1')
                                                     {{ $overdueDays . ' days ago' }}
                                                 @elseif ($overdueDays == '1')
                                                     {{ $overdueDays . ' day ago' }}
                                                 @endif
                                             </span>
                                         @else
                                             {{ ($totalDays != '0' ? $totalDays . ' days left' : '' || $totalDays == '1') ? $totalDays . ' day left' : '' }}
                                         @endif
                                     </span>
                                 </div>
                             </div>
                             <div class="pt-2 pb-4 text-center justify-content-around ps-2 pe-2 d-flex">
                                 <button type="button"
                                     class="mb-2 btn btn-md bg-primary-transparent text-primary border-primary"
                                     title="Assign again" wire:click="reAssignBook({{ $ibook->id }})">
                                     <i class="fa fa-rotate-left font-weight-bold"></i>&nbsp;
                                     <span>Assign again</span>
                                 </button>
                                 <button type="button"
                                     class="mb-2 btn btn-md bg-success-transparent text-primary border-primary"
                                     title="Return the book" wire:click="returnBook({{ $ibook->id }})">
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
