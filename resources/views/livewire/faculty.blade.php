<div class="pt-5 row">
    <div class="mt-5 col-md-12">
        <div class="mt-5 card">
            <div class="card-header">
                <div class="card-title">Faculty DataTable</div>
            </div>
            <ul id="megaError" style="position: absolute;top: 0;right:0;z-index:999">
                @include('backend.message')
            </ul>

            <div class="card-body">
                <div class="table-responsive">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <button class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#addFaculty">Add</button>
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
                                                style="width: 30px;">Fid</th>
                                            <th class="wd-15p border-bottom-0 sorting sorting_asc" tabindex="0"
                                                aria-controls="example1" rowspan="1" colspan="1"
                                                aria-sort="ascending"
                                                aria-label="First name: activate to sort column descending"
                                                style="width: 100px;">Faculty name</th>
                                            <th class="wd-15p border-bottom-0 sorting sorting_asc" tabindex="0"
                                                aria-controls="example1" rowspan="1" colspan="1"
                                                aria-sort="ascending"
                                                aria-label="First name: activate to sort column descending"
                                                style="width: 30px;">Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($faculty as $fact)
                                            <tr class="odd">
                                                <td>{{ $fact->id }}</td>
                                                <td>{{ $fact->faculty_name }}</td>
                                                <td class="gap-2 d-flex">
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-toggle="modal" data-target="#rmFaculty">
                                                        Remove
                                                    </button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="rmFaculty" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">

                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h3 class="text-center">Are you sure?</h3>
                                                            <span class="text-center text-danger">
                                                                It will removed faculty permanently. Make sure
                                                                while removing anything.
                                                            </span>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancel</button>
                                                            <button type="button"
                                                                wire:click="removeFaculty({{ $fact->id }})"
                                                                class="btn btn-danger">
                                                                Delete
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">No students found!</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-end align-items-center">
                                    {{ $faculty->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="addFaculty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title book-title" id="exampleModalLongTitle">Add Faculty</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="fs-4" style="color: #fff">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <form wire:submit.prevent="add_faculty" method="post">
                                <label for="faculty_name">Faculty Name</label>
                                <input type="text" name="faculty_name" id="faculty_name"
                                    class="form-control @error('faculty_name') is-invalid @enderror" required
                                    value="{{ old('faculty_name') }}" wire:model="faculty_name" autofocus>
                                @error('faculty_name')
                                    <span class="text-danger">{{ $message }}</span><br>
                                @enderror

                                <button type="submit" class="mt-3 btn btn-primary">Add</button>
                                <button type="button" class="mt-3 btn btn-danger" data-dismiss="modal"
                                    aria-label="Close">
                                    Cancel
                                </button>

                                <div class="d-flex judtify-content-center align-items-center">
                                    <span class="text-success" wire:loading
                                        wire:target="add_faculty">Adding&nbsp;please&nbsp;wait&nbsp;.&nbsp;.&nbsp;.&nbsp;.</span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
