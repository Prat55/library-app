<?php

namespace App\Livewire;

use App\Models\AssignBook;
use App\Models\RequestHistory;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ReqHistory extends Component
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


    #[Computed()]
    public function req_histories()
    {
        return RequestHistory::latest()
            ->where('user_id', 'like', "%{$this->search}%")
            ->paginate(8);
    }

    public function render()
    {
        return view('livewire.req-history');
    }
}
