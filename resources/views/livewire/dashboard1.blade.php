 <!-- Row-1 -->
 <div class="pt-5 row">
     <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
         <div class="overflow-hidden border-0 card dash1-card dash1">
             <div class="card-body">
                 <div class="row">
                     <div class="col-md-12 col-sm-6 col-6">
                         <div class="">
                             <span class="fs-14 font-weight-normal">Total Students</span>
                             <h2 class="mb-2 number-font carn1 font-weight-bold">{{ $students }}</h2>
                             <span class="">
                                 @php
                                     $total = $students / 5000;
                                     $totalPercentageStudents = number_format($total);
                                 @endphp
                                 <i class="fa fa-arrow-up"></i> {{ $totalPercentageStudents }}%
                                 <span class="ms-1 fs-11">
                                     Students Joined
                                 </span>
                             </span>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
         <div class="overflow-hidden border-0 card dash1-card dash2">
             <div class="card-body">
                 <div class="row">
                     <div class="col-md-12 col-sm-6 col-6">
                         <div class="">

                             <span class="fs-14">Total Books</span>
                             <h2 class="mt-1 mb-2 number-font carn2 font-weight-bold">{{ $books }}</h2>
                             @php
                                 $total = $books / 10000;
                                 $totalPercentageBook = number_format($total);
                             @endphp
                             <span class=""><i class="fa fa-arrow-up"></i>{{ $totalPercentageBook }}%
                                 <span class="ms-1 fs-11">Books added</span>
                             </span>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
         <div class="overflow-hidden border-0 card dash1-card dash3">
             <div class="card-body">
                 <div class="row">
                     <div class="col-md-12 col-sm-6 col-6">
                         <div class="">
                             <span class="fs-14">Total Fine</span>
                             <h2 class="mt-1 mb-2 number-font carn2 font-weight-bold">₹2,590</h2>
                             <span class=""><i class="fa fa-arrow-up"></i> 60%
                                 <span class="ms-1 fs-11">
                                     Fine collected
                                 </span>
                             </span>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
         <div class="overflow-hidden border-0 card dash1-card dash4">
             <div class="card-body">
                 <div class="row">
                     <div class="col-md-12 col-sm-6 col-6">
                         <div class="text-justify">

                             <span>Total Teachers</span>
                             <h2 class="mt-1 mb-2 number-font carn2 font-weight-bold">{{ $teachers }}</h2>
                             @php
                                 $total = $teachers / 1000;
                                 $totalPercentageTeachers = number_format($total);
                             @endphp
                             <span class=""><i class="fa fa-arrow-up"></i> {{ $totalPercentageTeachers }}% <span
                                     class="ms-1 fs-11">Teachers
                                     Joined</span>
                             </span>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- End Row-1 -->
