<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\User;
use Livewire\Component;

class Dashboard1 extends Component
{
    public function render()
    {
        return view('livewire.dashboard1', [
            'students' => User::students()->count(),
            'teachers' => User::teachers()->count(),
            'books' => Book::count()
        ]);
    }
}
