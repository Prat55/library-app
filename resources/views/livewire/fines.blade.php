 <div class="pt-5 row">
     <div class="col-md-12">
         <div class="card">
             <div class="card-header">
                 <div class="card-title">Students DataTable</div>
             </div>
             <ul id="megaError" style="position: absolute;top: 0;right:0;z-index:999">
                 @include('backend.message')
             </ul>

             <div class="card-body">
                 <div class="table-responsive">
                     <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                         <div class="row">
                             <div class="col-md-12 d-flex justify-content-end">
                                 <div class="col-md-3 ">
                                     @livewire('search-by-id')
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-sm-12">
                                 <table class="table table-bordered text-nowrap dataTable no-footer" id="example1"
                                     role="grid" aria-describedby="example1_info">
                                     <thead>
                                         <tr role="row">
                                             <th class="wd-10p border-bottom-0 sorting" tabindex="0"
                                                 aria-controls="example1" rowspan="1" colspan="1"
                                                 aria-label="Salary: activate to sort column ascending"
                                                 style="width: 30px;">Uid</th>
                                             <th class="wd-15p border-bottom-0 sorting sorting_asc" tabindex="0"
                                                 aria-controls="example1" rowspan="1" colspan="1"
                                                 aria-sort="ascending"
                                                 aria-label="First name: activate to sort column descending"
                                                 style="width: 116.55px;">User Name</th>
                                             <th class="wd-25p border-bottom-0 sorting" tabindex="0"
                                                 aria-controls="example1" rowspan="1" colspan="1"
                                                 aria-label="E-mail: activate to sort column ascending"
                                                 style="width: 116.55px;">Book Name</th>
                                             <th class="wd-15p border-bottom-0 sorting" tabindex="0"
                                                 aria-controls="example1" rowspan="1" colspan="1"
                                                 aria-label="Start date: activate to sort column ascending"
                                                 style="width: 90px;">Overdued</th>
                                             <th class="wd-15p border-bottom-0 sorting" tabindex="0"
                                                 aria-controls="example1" rowspan="1" colspan="1"
                                                 aria-label="Start date: activate to sort column ascending"
                                                 style="width: 130.863px;">Total Amount</th>
                                             <th class="wd-10p border-bottom-0 sorting" tabindex="0"
                                                 aria-controls="example1" rowspan="1" colspan="1"
                                                 aria-label="Salary: activate to sort column ascending"
                                                 style="width: 96.925px;">Status
                                             </th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @forelse ($fines as $fine)
                                             <tr class="odd">
                                                 <td>{{ $fine->id }}</td>
                                                 <td class="sorting_1">{{ $fine->user->name }}</td>
                                                 <td>{{ $fine->book->book_name }}</td>
                                                 <td>{{ $fine->overdue_days }}</td>
                                                 <td>{{ $fine->total_amount }}</td>
                                                 <td class="gap-2 d-flex">
                                                     @if ($fine->status == 'paid')
                                                         <span class="text-success">Paid</span>
                                                     @elseif ($fine->status == 'unpaid')
                                                         <span class="text-danger">Unpaid</span>
                                                     @else
                                                         <span class="text-warning">In process</span>
                                                     @endif
                                                 </td>
                                             </tr>
                                         @empty
                                             <tr>
                                                 <td colspan="7" class="text-center">No fine collected!</td>
                                             </tr>
                                         @endforelse

                                     </tbody>
                                 </table>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-sm-12 col-md-7">
                                 <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                     {{ $fines->links() }}
                                 </div>
                             </div>
                         </div>

                         {{-- <div class="modal fade" id="addStudent" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                             <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h3 class="modal-title book-title" id="exampleModalLongTitle">Add Student
                                         </h3>
                                         <button type="button" class="close" data-dismiss="modal"
                                             aria-label="Close">
                                             <span aria-hidden="true" class="fs-4"
                                                 style="color: #fff">&times;</span>
                                         </button>
                                     </div>
                                     <div class="modal-body">
                                         <div class="col-md-12">
                                             <form wire:submit.prevent="addStudent" method="post">

                                                 <label for="name">Student Name</label>
                                                 <input type="text" name="name" id="name"
                                                     class="form-control" required value="{{ old('name') }}"
                                                     wire:model="name">
                                                 @error('name')
                                                     <span class="text-danger">{{ $message }}</span><br>
                                                 @enderror

                                                 <label for="email" class="mt-2">Student Email</label>
                                                 <input type="email" name="email" id="email"
                                                     class="form-control" required value="{{ old('email') }}"
                                                     wire:model="email">
                                                 @error('email')
                                                     <span class="text-danger">{{ $message }}</span><br>
                                                 @enderror

                                                 <label for="faculty_id" class="mt-2">Faculty</label>
                                                 <select name="faculty_id" id="faculty_id" class="form-control"
                                                     wire:model.change="faculty_id">
                                                     @foreach ($faculties as $faculty)
                                                         <option value="{{ $faculty->id }}">
                                                             {{ $faculty->faculty_name }}</option>
                                                     @endforeach
                                                 </select>
                                                 @error('faculty_id')
                                                     <span class="text-danger">{{ $message }}</span><br>
                                                 @enderror

                                                 <label for="phone" class="mt-2">Phone</label>
                                                 <input type="number" name="phone" id="phone"
                                                     class="form-control" required value="{{ old('phone') }}"
                                                     wire:model="phone" maxlength="10" minlength="10">
                                                 @error('phone')
                                                     <span class="text-danger">{{ $message }}</span><br>
                                                 @enderror

                                                 <label for="pass" class="mt-2">Password</label>
                                                 <input type="password" name="password" id="password"
                                                     class="form-control" required wire:model="pass">
                                                 @error('pass')
                                                     <span class="text-danger">{{ $message }}</span><br>
                                                 @enderror

                                                 <button type="submit" class="mt-3 btn btn-primary">Add</button>
                                                 <button type="button" class="mt-3 btn btn-danger ms-2"
                                                     data-dismiss="modal" aria-label="Close">
                                                     Cancel
                                                 </button>
                                             </form>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div> --}}
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
