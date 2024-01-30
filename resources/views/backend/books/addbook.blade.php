<x-app-layout>

    <div>
        <div class="page-header position-relative">
            <div class="page-leftheader">
                <h4 class="mb-0 page-title text-primary">Add Book</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="p-5 card">
                    <form action="/addbook" method="post" class="formSubmit" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12 d-flex">
                            <div class="col-md-6">
                                <label for="isbnNo" class="form-label">ISBN No.</label>
                                <input type="text" class="form-control" name="isbnNo" id="isbnNo"
                                    value="{{ old('isbnNo') }}">
                                @error('isbnNo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="category" class="form-label">Category</label>
                                <input type="text" class="form-control" name="category" id="category"
                                    value="{{ old('category') }}">
                                @error('category')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 d-flex">
                            <div class="col-md-6">
                                <label for="author" class="form-label">Author Name</label>
                                <input type="text" name="author" id="author" class="form-control"
                                    value="{{ old('author') }}">
                                @error('author')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="book_name" class="form-label">Book Name</label>
                                <input type="text" name="book_name" id="book_name" class="form-control"
                                    value="{{ old('book_name') }}">
                                @error('book_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="pt-2 col-md-12 d-flex align-items-center">
                            <div class="col-md-6">
                                <label for="description" class="form-label">Description (optional)</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                            </div>
                            <div class=" col-md-6">
                                <div class="col md-12">
                                    <label for="book_img" class="form-label">
                                        Book Image
                                        <span class="text-warning">
                                            (227 W x 327 H px)
                                        </span>
                                    </label>
                                </div>
                                <div class="col-md-12 justify-content-center align-items-center d-flex bookimage">
                                    <div class="col-md-6">
                                        <input type="file" name="book_img" id="book_img" />

                                        <label for="book_pdf" class="mt-4">Pdf Of Book (optional)</label>
                                        <input type="file" name="book_pdf" id="book_pdf" />
                                    </div>

                                    <img id="image-preview" src="/books/mahabharat.jpg" width="150px" height="200px" />
                                </div>
                                @error('book_img')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="pt-2 pb-4 col-md-12 d-flex">
                            <div class="col-md-6">
                                <label for="quantity" class="form-label">Book Quantity</label>
                                <input type="number" name="quantity" id="quantity" class="form-control"
                                    value="{{ old('quantity') }}">
                                @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="faculty" class="form-label">Faculty</label>
                                <select name="faculty" id="faculty" class="form-control">
                                    @forelse ($faculties as $fac)
                                        <option value="{{ $fac->id }}">{{ $fac->faculty_name }}</option>
                                    @empty
                                        <option selected>No faculties added!</option>
                                    @endforelse
                                </select>
                                @error('faculty')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="pt-2 pb-4 col-md-12">
                            {{-- <button type="button" class="btn btn-primary addBook">Add</button> --}}
                            <input type="submit" value="Add" class="btn btn-primary ">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
