<x-app-layout>
    @section('title')
        Edit Book {{ $book->book_author }}
    @endsection

    <div>
        <div class="page-header position-relative">
            <div class="page-leftheader">
                <h4 class="mb-0 page-title text-primary">Edit Book</h4>
            </div>

            <ul id="megaError" style="position: absolute;top: 0;right:0;z-index:999">
                @include('backend.message')
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="p-5 card">
                    <form enctype="multipart/form-data" action="/book/update/{{ $book->book_token }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12 d-flex">
                            <div class="col-md-6">
                                <label for="serialno" class="form-label">Serial Number&nbsp;<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="serialno" id="serialno"
                                    value="{{ $book->book_serial_number }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="book_name" class="form-label">Book Name&nbsp;<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="book_name" id="book_name" class="form-control"
                                    value="{{ $book->book_name }}">
                            </div>
                        </div>
                        <div class="col-md-12 d-flex">
                            <div class="col-md-6">
                                <label for="author_name" class="form-label">Author Name&nbsp;<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="author_name" id="author_name" class="form-control"
                                    value="{{ $book->book_author }}">

                            </div>

                            <div class="col-md-6">
                                <label for="faculty" class="form-label">Faculty&nbsp;<span
                                        class="text-danger">*</span></label>
                                <select name="faculty" id="faculty" class="form-control">
                                    @forelse ($faculties as $faculty)
                                        <option value="{{ $faculty->id }}"
                                            {{ $faculty->id == $book->faculty_id ? 'selected' : '' }}>
                                            {{ $faculty->faculty_name }}</option>
                                    @empty
                                        <option>No faculties added!</option>
                                    @endforelse
                                </select>
                            </div>

                        </div>
                        <div class="pt-2 col-md-12 d-flex align-items-center">
                            <div class="col-md-6">
                                <label for="description" class="form-label">Description (optional)</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="10">
                                    {{ $book->book_description }}
                                </textarea>
                            </div>
                            <div class="col-md-6">
                                <div class="col md-12">
                                    <label for="book_image" class="form-label">
                                        Book Image&nbsp;<span class="text-danger">*</span>
                                        <span class="text-warning">
                                            (227 W x 327 H px)
                                        </span>
                                    </label>
                                </div>
                                <div class="col-md-12 justify-content-center align-items-center d-flex bookimage">
                                    <div class="col-md-6">
                                        <input accept="jpg,jpeg,png" type="file" name="book_image" id="book_image" />

                                        <label for="book_pdf" class="mt-4">Pdf Of Book (optional)</label>
                                        <input type="file" name="book_pdf" id="book_pdf" accept="pdf" />
                                    </div>

                                    <div style="width: 150px;height:200px;"
                                        class="d-flex justify-content-center align-items-center">
                                        @if ($book->book_image_path)
                                            <img src="{{ asset('storage/' . $book->book_image_path) }}" width="150px"
                                                height="200px" />
                                        @endif
                                    </div>


                                </div>

                                @error('book_image_path')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                @error('book_pdf_path')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="pt-2 pb-4 col-md-12 d-flex">
                            <div class="col-md-6">
                                <label for="quantity" class="form-label">Book Quantity&nbsp;<span
                                        class="text-danger">*</span></label>
                                <input type="number" name="quantity" id="quantity" class="form-control"
                                    value="{{ $book->book_quantity }}">
                                @error('book_quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="published_at" class="form-label">Publishing Date and Time&nbsp;<span
                                        class="text-danger">*</span></label>
                                <input type="datetime-local" name="published_at" id="published_at" class="form-control"
                                    value="{{ $book->published_at }}">
                                @error('published_at')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="pt-2 pb-4 col-md-12">
                            {{-- <button type="button" class="btn btn-primary addBook">Add</button> --}}

                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>

                        </div>

                        {{-- <div class="col-md-12">
                            <h3 class="{{ $message['status'] == '200' ? 'text-success' : 'text-danger' }} fs-6">
                                {{ $message['message'] }}
                            </h3>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
