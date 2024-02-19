<?php

namespace App\Livewire;

use App\Models\AssignBook as ModelsAssignBook;
use Livewire\Component;
use Livewire\WithPagination;

class AssignBook extends Component
{
    use WithPagination;

    public function assignBook(int $req_id)
    {
        $book_req = ModelsAssignBook::findOrFail($req_id);
        if ($book_req) {
            $book_req->status = "accepted";
            $book_req->update();

            return redirect()->back()->with('success', 'Book request is accepted.');
        } else {
            return redirect()->back()->with('error', 'Book not found!');
        }
    }

    public function rejectBook(int $req_id)
    {
        $book_req = ModelsAssignBook::findOrFail($req_id);
        if ($book_req) {
            $book_req->status = "rejected";
            $book_req->update();

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
