<x-app-layout>
    @section('title')
        New User
    @endsection

    <div>
        <div class="page-header position-relative">
            <div class="page-leftheader">
                <h4 class="mb-0 page-title text-primary">New User</h4>
            </div>

            <ul id="megaError" style="position: absolute;top: 0;right:0;z-index:999">
                @include('backend.message')
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="p-5 card">
                    <form enctype="multipart/form-data" action="{{ route('add_user') }}" method="post">
                        @csrf

                        <div class="col-md-12 d-flex">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name&nbsp;
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="name" id="name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email&nbsp;
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" name="email" id="email" class="form-control">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 d-flex">
                            <div class="col-md-6">
                                <label for="phone" class="form-label">
                                    Phone&nbsp;
                                </label>
                                <input type="text" name="phone" id="phone" class="form-control" maxlength="10"
                                    minlength="10">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="faculty" class="form-label">Faculty&nbsp;
                                    <span class="text-danger">*</span>
                                </label>

                                <select name="faculty" id="faculty" class="form-control">
                                    <option selected>
                                        <<&nbsp;Select&nbsp;Faculty&nbsp;>>
                                    </option>
                                    @forelse ($faculties as $faculty)
                                        <option value="{{ $faculty->id }}">{{ $faculty->faculty_name }}</option>
                                    @empty
                                        <option>No faculties added!</option>
                                    @endforelse
                                </select>
                                @error('faculty_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="pt-2 pb-4 col-md-12 d-flex">
                            <div class="col-md-6">
                                <label for="password" class="form-label">Password&nbsp;
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="password" name="password" id="password" class="form-control">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="role" class="form-label">Role&nbsp;
                                    <span class="text-danger">*</span>
                                </label>

                                <select name="role" id="role" class="form-control">
                                    <option selected>
                                        <<&nbsp;Select&nbsp;Role&nbsp;>>
                                    </option>
                                    <option value="user">Student</option>
                                    <option value="teacher">Teacher</option>
                                    @if (auth()->user()->role === 'admin' || auth()->user()->role === 'super-admin')
                                        <option value="admin">Admin</option>
                                    @endif
                                    @if (auth()->user()->role === 'super-admin')
                                        <option value="super-admin">Super Admin</option>
                                    @endif
                                </select>
                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="pt-2 pb-4 col-md-12">
                            <button type="submit" class="btn btn-primary">
                                Add
                            </button>

                            <button type="button" class="btn btn-secondary ms-2" onclick="history.back()">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
