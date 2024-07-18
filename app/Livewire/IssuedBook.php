<?php

namespace App\Livewire;

use App\Models\AssignBook;
use App\Models\Book;
use App\Models\Fine;
use App\Models\RequestHistory;
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
        $issuedBook = AssignBook::findOrFail($book_id);
        $issuedHistory = RequestHistory::where('user_id', $issuedBook->user_id)->where('book_id', $issuedBook->book_id)->where('start_date', $issuedBook->start_date)->first();
        $book = Book::findOrFail($issuedBook->book_id);

        // ?Searching in fine table for ensuring fine is paid or not by user
        $fine = Fine::where('user_id', $issuedBook->user_id)->unpaid()->first();

        if (!$fine) {
            if ($issuedBook) {
                $quantity = $book->book_quantity + 1;
                $book->book_quantity = $quantity;
                $book->update();
                $issuedBook->delete();

                $issuedHistory->end_date = Carbon::now();
                $issuedHistory->update();

                return redirect()->route('issued-books')->with('success', 'Book is returned by user.');
            } else {
                return redirect()->route('issued-books')->with('error', 'Book not found!');
            }
        } else {
            return redirect()->route('issued-books')->with('error', 'Fine is not paid!');
        }
    }

    public function reAssignBook(int $book_id)
    {
        $issuedBook = AssignBook::findOrFail($book_id);
        $issuedHistory = new RequestHistory();
        $fine = Fine::where('user_id', $issuedBook->user_id)->unpaid()->first();

        if (!$fine) {
            if ($issuedBook) {
                if ($issuedBook->end_date <= Carbon::now()) {
                    $issuedBook->start_date = Carbon::now();
                    $issuedBook->end_date = Carbon::now()->addDays(7);
                    $assignCount = $issuedBook->re_assign_count + 1;
                    $issuedBook->re_assign_count = $assignCount;
                    $issuedBook->update();

                    $issuedHistory->user_id = $issuedBook->user_id;
                    $issuedHistory->book_id = $issuedBook->book_id;
                    $issuedHistory->start_date = Carbon::now();
                    $issuedHistory->end_date = Carbon::now()->addDays(7);
                    $issuedHistory->status = 're-assign';
                    $issuedHistory->save();

                    return redirect()->route('issued-books')->with('success', 'Book is reassign to user successfully');
                } else {
                    return redirect()->route('issued-books')->with('error', 'Not overdued!');
                }
            } else {
                return redirect()->route('issued-books')->with('error', 'Book not found!');
            }
        } else {
            return redirect()->route('issued-books')->with('error', 'Fine is not paid!');
        }
    }

    public function render()
    {
        $issuedBooks = AssignBook::accepted()->latest()->where('user_id', 'like', "%{$this->search}%")->paginate(8);
        return view('livewire.issued-book', compact('issuedBooks'));
    }
}

//? All logics are made by Pratik Desai
