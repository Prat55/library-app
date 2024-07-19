<?php

namespace App\Livewire;

use App\Models\Fine;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Fines extends Component
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

    public function render()
    {
        return view('livewire.fines', [
            'fines' => Fine::latest()
                ->where('user_id', 'like', "%{$this->search}%")
                ->paginate(8)
        ]);
    }
}
