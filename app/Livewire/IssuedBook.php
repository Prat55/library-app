<?php

namespace App\Livewire;

use App\Models\AssignBook;
use Livewire\Component;
use Livewire\WithPagination;

class IssuedBook extends Component
{
    use WithPagination;

    public function returnBook(int $book_id)
    {
        $book = AssignBook::findOrFail($book_id);
        if ($book) {
            $book->status = "returned";
            $book->update();

            return redirect()->back()->with('success', 'Book is returned by user.');
        } else {
            return redirect()->back()->with('error', 'Book not found!');
        }
    }

    public function render()
    {
        return view('livewire.issued-book', [
            'issuedBooks' => AssignBook::accepted()->latest()->paginate(8)
        ]);
    }
}
