 <div>
     <div class="page-header d-flex justify-content-between align-items-center">
         <div class="page-leftheader">
             <h4 class="mb-0 page-title text-primary">Issued Books History</h4>
         </div>
         <ul id="megaError" style="position: absolute;top: 0;right:0;z-index:999">
             @include('backend.message')
         </ul>

         <livewire:search-by-id />
     </div>

     <div class="row">
         <div class="col-lg-12 col-xl-12">
             <div class="row">
                 @forelse ($this->req_histories as $rbook)
                     <div class="col-xl-3 col-lg-3 alert">
                         <div class="card item-card">
                             <div class="pb-0 card-body">
                                 <div class="text-center zoom">
                                     <img src="{{ asset('storage/' . $rbook->book->book_image_path) }}"
                                         alt="{{ $rbook->book->book_name }}" class="img-fluid w-100 br-7"
                                         style="height: 350px!important; width:100%!important">
                                 </div>
                                 <div class="w-full mt-3">
                                     <h5>
                                         <b>{{ $rbook->book->book_name }}</b> book is assign to
                                     </h5>
                                     <span><b>Email:</b></span>
                                     <span style="font-size: 0.8rem; color: red">&nbsp;
                                     @empty($rbook->user->email)
                                         {{ $rbook->olduser->email }}
                                     @else
                                         {{ $rbook->user->email }}
                                     @endempty

                                 </span><br>
                                 <span><b>Name:</b></span>
                                 <span>
                                 @empty($rbook->user->name)
                                     {{ $rbook->olduser->name }}
                                 @else
                                     {{ $rbook->user->name }}
                                 @endempty
                                 &nbsp; -
                                 {{ $rbook->book->faculty->faculty_name }}
                             </span><br>
                             @if ($rbook->status == 'rejected')
                                 <span><b>Status:</b></span>
                                 <span class="text-danger">&nbsp;Rejected</span>
                             @elseif ($rbook->status == 'request')
                                 <span><b>Status:</b></span>
                                 <span class="text-warning">&nbsp;Under request</span>
                             @else
                                 <span><b>Issued On:</b></span>
                                 <span>&nbsp;{{ $rbook->start_date }}</span><br>
                                 <span><b>Return In:</b></span>
                                 <span>&nbsp;{{ $rbook->end_date }}</span>
                             @endif
                         </div>
                     </div>
                     <div class="pt-2 pb-4 text-center justify-content-around ps-2 pe-2 d-flex">

                     </div>
                 </div>
             </div>
         @empty
             <div class="justify-content-center d-flex col-md-12">
                 No history found!
             </div>
         @endforelse
     </div>
     <div class="d-flex justify-content-end">
         {{ $this->req_histories->links() }}
     </div>
 </div>
</div>
</div>
