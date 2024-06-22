<?php

namespace App\Livewire;

use App\Models\AssignBook as ModelsAssignBook;
use App\Models\Book;
use App\Models\RequestHistory;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class AssignBook extends Component
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
            $book_req2->status = "rejected";
            $book->update();
            $book_req->delete();
            $book_req2->update();

            return redirect()->back()->with('success', 'Book request is rejected.');
        } else {
            return redirect()->back()->with('error', 'Book not found!');
        }
    }

    public function render()
    {
        return view('livewire.assign-book', [
            'assignBooks' => ModelsAssignBook::requests()
                ->where('user_id', 'like', "%{$this->search}%")
                ->paginate(8)
        ]);
    }
}
