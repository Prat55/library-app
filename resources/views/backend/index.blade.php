<x-app-layout>
    @section('title')
        Dashboard
    @endsection
    <!-- Row-1 -->
    @livewire('dashboard1')
    <!-- End Row-1 -->
    <!-- Row-2 -->
    <div class="row">
        {{-- <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header border-bottom-0">
                <h3 class="card-title">Sales Activity</h3>
            </div>
            <div class="pt-0 card-body">
                <div class="chart-wrapper">
                    <div id="statistics"></div>
                </div>
            </div>
        </div>
    </div> --}}
        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Recent Messages
                    </h3>
                    <div class="card-options">
                        <a href="javascript:void(0);" class="btn btn-sm btn-primary">View All</a>
                    </div>
                </div>
                <div class="p-0 card-body">
                    <ul class="recent-activity">
                        <li class="mt-5 mb-5">
                            <div>
                                <span class="text-white activity-timeline bg-primary">P</span>
                                <div class="activity-timeline-content">
                                    <span class="font-weight-normal1 fs-13">Pratik Desai,</span><span
                                        class="text-muted fs-12 float-end">6:45pm</span>
                                    <span class="activity-sub-content text-info fs-11">pratikdesai@gmail.com</span>
                                    <p class="mt-1 text-muted fs-12">
                                        More than 200 new books are added
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="mb-5">
                            <div>
                                <span class="text-white activity-timeline bg-success">M</span>
                                <div class="activity-timeline-content">
                                    <span class="font-weight-normal1 fs-13">Milind Tajane,</span><span
                                        class="text-muted fs-12 float-end">1day ago</span>
                                    <span class="activity-sub-content text-danger fs-11">milindtajane@gmail.com</span>
                                    <p class="mt-1 text-muted fs-12">
                                        Sir i want bsc cs subject books is it available
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="mb-5">
                            <div>
                                <span class="text-white activity-timeline bg-warning">3</span>
                                <div class="activity-timeline-content">
                                    <span class="font-weight-normal1 fs-13">New Students,</span><span
                                        class="text-muted fs-12 float-end">7.45pm</span>
                                    <span class="activity-sub-content text-success fs-11">24% New
                                        students</span>
                                    <p class="mt-1 text-muted fs-12">1.3k new students reached us
                                        this year</p>
                                </div>
                            </div>
                        </li>
                        <li class="mb-5">
                            <div>
                                <span class="text-white activity-timeline bg-info">4</span>
                                <div class="activity-timeline-content">
                                    <span class="font-weight-normal1 fs-13">New Reviews,</span><span
                                        class="text-muted fs-12 float-end">1min ago</span>
                                    <span class="activity-sub-content text-warning fs-11">96% Positive
                                        reviews.</span>
                                    <p class="mt-1 text-muted fs-12">There are 500 plus new reviews
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="mb-5">
                            <div>
                                <span class="text-white activity-timeline bg-danger">5</span>
                                <div class="activity-timeline-content">
                                    <span class="font-weight-normal1 fs-13">Customer
                                        Visits,</span><span class="text-muted fs-12 float-end">today</span>
                                    <span class="activity-sub-content text-secondary fs-11">33% target
                                        achieved.</span>
                                    <p class="mt-1 text-muted fs-12">daily 20 plus new customers
                                        visits us</p>
                                </div>
                            </div>
                        </li>
                        <li class="mb-5 border-bottom-0">
                            <div>
                                <span class="text-white activity-timeline bg-teal">6</span>
                                <div class="activity-timeline-content">
                                    <span class="font-weight-normal1 fs-13">Sale
                                        Consistency,</span><span class="text-muted fs-12 float-end">3
                                        days ago</span>
                                    <span class="activity-sub-content text-teal fs-11">90%
                                        growth.</span>
                                    <p class="mt-1 text-muted fs-12">More than 5 Sales happening every
                                        week</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row-2 -->
</x-app-layout>
