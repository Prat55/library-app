<div class="relative">
    <div class="flex items-center justify-end w-full">

        <div class="relative" style="width:300px">
            <livewire:search />

            @if ($search)
                <div class="absolute top-0 right-0 w-full p-2 overflow-y-scroll bg-white rounded shadow"
                    style="height:auto;overflow-y:scroll;max-height:300px;">
                    Searching {{ $search }}

                    @forelse ($this->searchData as $item)
                        <a>
                            <div class="flex items-center py-2">
                                <div class="mx-2 shadow">
                                    <img src="{{ asset('storage/' . $item->book_image_path) }}"
                                        alt="{{ $item->book_name }}" height="50px" width="50px">
                                </div>

                                <div class="w-full text-center">
                                    <h2>{{ $item->book_name }}</h2>
                                    <span>-{{ $item->faculty->faculty_name }}</span>
                                </div>
                                <div class="w-full text-center border rounded-md">
                                    <livewire:book-now :bookId='$item->id' />
                                </div>
                            </div>
                        </a>
                    @empty
                        <h2>No results found!</h2>
                    @endforelse
                </div>
            @endif
        </div>
    </div>

    <div class="flex flex-wrap justify-center w-full gap-4 px-2 py-3">
        @forelse ($this->books as $book)
            <a
                class="items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700">
                <img class="object-cover w-full rounded-t-lg md:rounded-none md:rounded-s-lg"
                    src="{{ asset('storage/' . $book->book_image_path) }}" alt="{{ $book->book_name }}"
                    style="height: 420px;width:320px">
                <div class="px-2 py-4 leading-normal">
                    <span class="py-1 font-semibold">
                        Book Name :
                    </span>
                    <span>{{ $book->book_name ?: '-' }}</span><br>

                    <span class="font-semibold">
                        Book Author :
                    </span>
                    <span>{{ $book->book_author }}</span><br>

                    <span class="font-semibold">
                        Book Quantity :
                    </span>
                    <span>{{ $book->book_quantity }}</span><br>

                    @if ($book->faculty_id != 1)
                        <span class="font-semibold">
                            Faculty :
                        </span>
                        <span>{{ $book->faculty->faculty_name }}</span><br>
                    @else
                        <span class="font-semibold">
                            Featured
                        </span>
                    @endif

                    <div class="flex items-center justify-center border border-gray-800 rounded-md">
                        <livewire:book-now :bookId='$book->id' />
                    </div>
                </div>
            </a>
        @empty
            <div class="text-center">No books added!</div>
        @endforelse
    </div>
</div>
