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
        $issueRequest = ModelsAssignBook::findOrFail($req_id);
        $issueRequest2 = RequestHistory::findOrFail($req_id);

        if ($issueRequest) {
            $issueRequest->status = "accepted";
            $issueRequest2->status = "accepted";

            $issueRequest->start_date = Carbon::now();
            $issueRequest->end_date = Carbon::now()->addDays(7);

            $issueRequest2->start_date = Carbon::now();
            $issueRequest2->end_date = Carbon::now()->addDays(7);

            $issueRequest->update();
            $issueRequest2->update();

            return redirect()->back()->with('success', 'Book is issued to user successfully.');
        } else {
            return redirect()->back()->with('error', 'Book not found!');
        }
    }

    public function rejectBook(int $req_id)
    {
        $issueRequest = ModelsAssignBook::findOrFail($req_id);
        $issueRequest2 = RequestHistory::findOrFail($req_id);

        $book = Book::findOrFail($issueRequest->book_id);

        if ($issueRequest) {
            $quantity = $book->book_quantity + 1;
            $book->book_quantity = $quantity;
            $issueRequest2->status = "rejected";
            $book->update();
            $issueRequest->delete();
            $issueRequest2->update();

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

//? All logics are made by Pratik Desai
