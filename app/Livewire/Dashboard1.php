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
        $fines = Fine::paid()->latest();
        $fine = [];
        foreach ($fines as $fine) {
            $fine[] = $fine->total_amount;
        }

        $totalFine = array_sum($fine);

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
