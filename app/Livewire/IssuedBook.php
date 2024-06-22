<?php

namespace App\Livewire;

use App\Models\AssignBook;
use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class IssuedBook extends Component
{
    use WithPagination;

    #[Url()]
    public $search = '';

    #[On('search')]
    public function updateSearch($search)
    {
        $user = User::where('email', $search)->first();
        if ($user) {
            $this->search = $user->id;
        }
    }

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

    public function reAssignBook(int $book_id)
    {
        $assignBook = AssignBook::findOrFail($book_id);
        if ($assignBook) {
            $assignBook->start_date = Carbon::now();
            $assignBook->end_date = Carbon::now()->addDays(7);
            $assignCount = $assignBook->re_assign_count + 1;
            $assignBook->re_assign_count = $assignCount;

            return redirect()->back()->with('success', 'Book re assignment successfully');
        } else {
            return redirect()->back()->with('error', 'Book not found!');
        }
    }

    public function render()
    {
        $today = Carbon::now();
        $issuedBooks = AssignBook::accepted()->latest()->where('user_id', 'like', "%{$this->search}%")->paginate(8);
        return view('livewire.issued-book', compact('issuedBooks', 'today'));
    }
}
