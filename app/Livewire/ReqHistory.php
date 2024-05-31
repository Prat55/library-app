<?php

namespace App\Livewire;

use App\Models\AssignBook;
use App\Models\RequestHistory;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class ReqHistory extends Component
{
    use WithPagination;

    #[Computed()]
    public function req_histories()
    {
        return RequestHistory::latest()
            ->paginate(8);
    }

    public function render()
    {
        return view('livewire.req-history');
    }
}
