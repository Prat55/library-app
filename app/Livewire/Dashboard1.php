<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Fine;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Dashboard1 extends Component
{

    #[Computed()]
    public function fines()
    {
        $fines = Fine::paid()->sum('total_amount');

        $totalFine = $fines;

        return $totalFine;
    }

    public function render()
    {
        return view('livewire.dashboard1', [
            'students' => User::students()->count(),
            'teachers' => User::teachers()->count(),
            'books' => Book::count(),
        ]);
    }
}
