<?php

namespace App\Livewire;

use App\Models\AssignBook;
use App\Models\Book;
use Livewire\Component;

class BookNow extends Component
{
    public $bookId;

    public function mount($bookId)
    {
        $this->bookId = $bookId;
    }

    public function bookNow()
    {
        if (auth()->check()) {
            $bookNow = AssignBook::where('user_id', auth()->user()->id)->first();

            if (!$bookNow) {
                $book = Book::findOrFail($this->bookId);
                $quantity = $book->book_quantity - 1;
                $book->book_quantity = $quantity;
                $book->update();

                AssignBook::create([
                    'user_id' => auth()->user()->id,
                    'book_id' => $this->bookId,
                ]);

                return redirect()->back()->with('success', 'Book is added successfully');
            } else {
                return redirect()->back()->with('error', 'You have already added book!');
            }
        } else {
            return redirect()->route('login');
        }
    }



    public function render()
    {
        return view('livewire.book-now');
    }
}
