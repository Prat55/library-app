<?php

namespace App\Livewire;

use App\Models\AssignBook as ModelsAssignBook;
use App\Models\Book;
use App\Models\RequestHistory;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class AssignBook extends Component
{
    use WithPagination;

    public function assignBook(int $req_id)
    {
        $book_req = ModelsAssignBook::findOrFail($req_id);
        $book_req2 = RequestHistory::findOrFail($req_id);

        if ($book_req) {
            $book_req->status = "accepted";
            $book_req2->status = "accepted";

            $book_req->start_date = Carbon::now();
            $book_req->end_date = Carbon::now()->addDays(7);

            $book_req2->start_date = Carbon::now();
            $book_req2->end_date = Carbon::now()->addDays(7);
            $book_req->update();
            $book_req2->update();

            return redirect()->back()->with('success', 'Book request is accepted.');
        } else {
            return redirect()->back()->with('error', 'Book not found!');
        }
    }

    public function rejectBook(int $req_id)
    {
        $book_req = ModelsAssignBook::findOrFail($req_id);
        $book_req2 = RequestHistory::findOrFail($req_id);

        $book = Book::findOrFail($book_req->book_id);

        if ($book_req) {
            $quantity = $book->book_quantity + 1;
            $book->book_quantity = $quantity;
            $book_req->status = "rejected";
            $book_req2->status = "rejected";
            $book->update();
            $book_req->update();
            $book_req2->update();

            return redirect()->back()->with('success', 'Book request is rejected.');
        } else {
            return redirect()->back()->with('error', 'Book not found!');
        }
    }

    public function render()
    {
        return view('livewire.assign-book', [
            'assignBooks' => ModelsAssignBook::requests()->paginate(8)
        ]);
    }
}
