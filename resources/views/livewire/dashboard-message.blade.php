<div class="row">
    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Recent Messages
                </h3>
                <div class="card-options">
                    <a wire:navigate href="javascript:void(0);" class="btn btn-sm btn-primary">View All</a>
                </div>
            </div>

            <div class="p-0 card-body">
                <ul class="recent-activity">
                    @forelse ($messages as $message)
                        <li class="mt-5 mb-5">
                            <div>
                                <span class="text-white uppercase activity-timeline bg-primary">
                                    {{ $message->name[0] }}
                                </span>
                                <div class="activity-timeline-content">
                                    <span class="font-weight-normal1 fs-13">
                                        {{ $message->name }},
                                    </span>
                                    <span class="text-muted fs-12 float-end">
                                        {{ $message->updated_at->diffForHumans() }}
                                    </span>
                                    <span class="activity-sub-content text-info fs-11">
                                        {{ $message->email }}
                                    </span>
                                    <p class="mt-1 text-muted fs-12">
                                        {{ $message->getShortMessage() }}
                                    </p>
                                </div>
                            </div>
                        </li>
                    @empty
                        <li class="mt-5 mb-5">
                            <div class="text-center">
                                No messages found!
                            </div>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
