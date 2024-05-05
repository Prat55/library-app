<?php

namespace App\Livewire;

use App\Models\AssignBook;
use App\Models\Book;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class IssuedBook extends Component
{
    use WithPagination;

    public function returnBook(int $book_id)
    {
        $req = AssignBook::findOrFail($book_id);
        $book = Book::findOrFail($req->book_id);
        if ($req) {
            $quantity = $book->book_quantity + 1;
            $book->book_quantity = $quantity;
            $book->update();
            $req->delete();

            return redirect()->back()->with('success', 'Book is returned by user.');
        } else {
            return redirect()->back()->with('error', 'Book not found!');
        }
    }

    public function render()
    {
        $today = Carbon::now(); 
        $issuedBooks = AssignBook::accepted()->latest()->paginate(8);
        return view('livewire.issued-book', compact('issuedBooks', 'today'));
    }
}
