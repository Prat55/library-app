   <div class="p-5 card">
       <form enctype="multipart/form-data" wire:submit.prevent='add_book'>
           <div class="col-md-12 d-flex">
               <div class="col-md-6">
                   <label for="serialno" class="form-label">Serial Number&nbsp;<span class="text-danger">*</span></label>
                   <input type="text" class="form-control" name="serialno" id="serialno"
                       wire:model='book_serial_number'>
                   @error('book_serial_number')
                       <span class="text-danger">{{ $message }}</span>
                   @enderror
               </div>
               <div class="col-md-6">
                   <label for="book_name" class="form-label">Book Name&nbsp;<span class="text-danger">*</span></label>
                   <input type="text" name="book_name" id="book_name" class="form-control" wire:model='book_name'>
                   @error('book_name')
                       <span class="text-danger">{{ $message }}</span>
                   @enderror
               </div>
           </div>
           <div class="col-md-12 d-flex">
               <div class="col-md-6">
                   <label for="author_name" class="form-label">Author Name&nbsp;<span
                           class="text-danger">*</span></label>
                   <input type="text" name="author_name" id="author_name" class="form-control"
                       wire:model='book_author'>
                   @error('book_author')
                       <span class="text-danger">{{ $message }}</span>
                   @enderror
               </div>

               <div class="col-md-6">
                   <label for="faculty" class="form-label">Faculty&nbsp;<span class="text-danger">*</span></label>
                   <select name="faculty" id="faculty" class="form-control" wire:model.change='faculty_id'>
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
           <div class="pt-2 col-md-12 d-flex align-items-center">
               <div class="col-md-6">
                   <label for="description" class="form-label">Description (optional)</label>
                   <textarea class="form-control" name="description" id="description" cols="30" rows="10"
                       wire:model='book_description'>

                   </textarea>
                   @error('book_description')
                       <span class="text-danger">{{ $message }}</span>
                   @enderror
               </div>
               <div class=" col-md-6">
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
                           <input wire:model='image' accept="image/jpg, image/jpeg, image/png" type="file"
                               name="book_image" id="book_image" />

                           <label for="book_pdf" class="mt-4">Pdf Of Book (optional)</label>
                           <input type="file" name="book_pdf" id="book_pdf" wire:model='pdf' />
                       </div>

                       <div style="width: 150px;height:200px;" class="d-flex justify-content-center align-items-center">
                           <div wire:loading wire:target="image" class="text-center">
                               Uploading...
                           </div>

                           @if ($image)
                               <img src="{{ $image->temporaryUrl() }}" width="150px" height="200px" />
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
                   <input type="number" name="quantity" id="quantity" class="form-control" wire:model='book_quantity'>
                   @error('book_quantity')
                       <span class="text-danger">{{ $message }}</span>
                   @enderror
               </div>
               <div class="col-md-6">
                   <label for="published_at" class="form-label">Publishing Date and Time&nbsp;<span
                           class="text-danger">*</span></label>
                   <input type="datetime-local" name="published_at" id="published_at" class="form-control"
                       wire:model='published_at'>
                   @error('published_at')
                       <span class="text-danger">{{ $message }}</span>
                   @enderror
               </div>
           </div>

           <div class="pt-2 pb-4 col-md-12">
               {{-- <button type="button" class="btn btn-primary addBook">Add</button> --}}

               <button type="submit" class="btn btn-primary">
                   Add
               </button>

               <input type="button" value="Clear" class="btn btn-primary" wire:click='clear'>

               <span wire:loading wire:target='add_book'
                   class="fs-6 ps-5 text-warning">Adding&nbsp;.&nbsp;.&nbsp;.</span>
           </div>

           <div class="col-md-12">
               <h3 class="{{ $message['status'] == '200' ? 'text-success' : 'text-danger' }} fs-6">
                   {{ $message['message'] }}
               </h3>
           </div>
       </form>
   </div>
