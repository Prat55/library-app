<x-app-layout>
    @section('title')
        Add Book
    @endsection
    <div>
        <div class="page-header position-relative">
            <div class="page-leftheader">
                <h4 class="mb-0 page-title text-primary">Add Book</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12">
                @livewire('add-book')
            </div>
        </div>
    </div>

</x-app-layout>
