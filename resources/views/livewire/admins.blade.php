 <div class="pt-5 row">
     <div class="col-md-12">
         <div class="card">
             <div class="card-header">
                 <div class="card-title">Admin DataTable</div>
             </div>
             <ul id="megaError" style="position: absolute;top: 0;right:0;z-index:999">
                 @include('backend.message')
             </ul>

             <div class="card-body">
                 <div class="table-responsive">
                     <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                         <div class="row">
                             <div class="col-sm-12 col-md-6">
                                 <a href="{{ route('new_user') }}">
                                     <button class="btn btn-sm btn-primary">New</button>
                                 </a>
                             </div>
                             <div class="col-sm-12 col-md-6">
                                 <div id="example1_filter" class="dataTables_filter">
                                     <label class="gap-1 d-flex justify-content-end align-items-center">
                                         <input type="search" name="search" class="form-control form-control-sm"
                                             placeholder="Search anything related to student here."
                                             aria-controls="example1" x-model='query' value="{{ $this->search }}">

                                         <button type="button" class="btn btn-sm btn-primary"
                                             x-on:click="$dispatch('search', {search: query})">
                                             <i class="fa fa-search"></i>
                                         </button>
                                     </label>
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
                                                 style="width: 116.55px;">Name</th>
                                             <th class="wd-20p border-bottom-0 sorting" tabindex="0"
                                                 aria-controls="example1" rowspan="1" colspan="1"
                                                 aria-label="Position: activate to sort column ascending"
                                                 style="width: 100px;">Faculty</th>
                                             <th class="wd-25p border-bottom-0 sorting" tabindex="0"
                                                 aria-controls="example1" rowspan="1" colspan="1"
                                                 aria-label="E-mail: activate to sort column ascending"
                                                 style="width: 220.238px;">E-mail</th>
                                             <th class="wd-15p border-bottom-0 sorting" tabindex="0"
                                                 aria-controls="example1" rowspan="1" colspan="1"
                                                 aria-label="Start date: activate to sort column ascending"
                                                 style="width: 130.863px;">Phone</th>
                                             <th class="wd-10p border-bottom-0 sorting" tabindex="0"
                                                 aria-controls="example1" rowspan="1" colspan="1"
                                                 aria-label="Salary: activate to sort column ascending"
                                                 style="width: 96.925px;">Operations
                                             </th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @forelse ($admins as $admin)
                                             <tr class="odd">
                                                 <td>{{ $admin->id }}</td>
                                                 <td class="sorting_1">{{ $admin->name }}</td>
                                                 <td>
                                                     @if ($admin->faculty_id)
                                                         {{ $admin->faculty->faculty_name }}
                                                     @else
                                                         Not Selected
                                                     @endif
                                                 </td>
                                                 <td>{{ $admin->email }}</td>
                                                 <td>{{ $admin->phone }}</td>
                                                 <td class="gap-2 d-flex">
                                                     @if ($admin->status == 'active')
                                                         <button type="button" class="btn btn-sm btn-danger"
                                                             wire:click="ban({{ $admin->id }})">
                                                             Ban
                                                         </button>
                                                     @else
                                                         <button type="button" class="btn btn-sm btn-danger"
                                                             wire:click="unban({{ $admin->id }})">
                                                             Unban
                                                         </button>
                                                     @endif

                                                     @if (auth()->user()->role === 'admin' || auth()->user()->role === 'super-admin')
                                                         <button type="button" class="btn btn-sm btn-danger"
                                                             data-toggle="modal"
                                                             data-target="#rmUser{{ $admin->id }}">
                                                             Remove
                                                         </button>
                                                     @endif
                                                 </td>
                                             </tr>

                                             <div class="modal fade" id="rmUser{{ $admin->id }}" tabindex="-1"
                                                 role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                 aria-hidden="true">
                                                 <div class="modal-dialog modal-dialog-centered" role="document">
                                                     <div class="modal-content">
                                                         <div class="modal-body">
                                                             <h3 class="text-center">Are you sure?</h3>
                                                             <span class="text-center text-danger">
                                                                 If user will removed then data of user is also
                                                                 removed. So Make
                                                                 sure while removing anyone.
                                                             </span>
                                                         </div>
                                                         <div class="modal-footer">
                                                             <button type="button" class="btn btn-secondary"
                                                                 data-dismiss="modal">Cancel</button>
                                                             <button type="submit" class="btn btn-danger"
                                                                 wire:click="removeUser({{ $admin->id }})">
                                                                 Delete
                                                             </button>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         @empty
                                             <tr>
                                                 <td colspan="7" class="text-center">No admins found!</td>
                                             </tr>
                                         @endforelse

                                     </tbody>
                                 </table>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-sm-12 col-md-7">
                                 <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                     {{ $admins->links() }}
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
