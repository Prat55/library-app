<?php

namespace App\Livewire;

use Livewire\Component;

class BookCountHome extends Component
{
    public $quantity;

    public function mount($quantity)
    {
        $this->quantity = $quantity;
    }

    public function render()
    {
        return view('livewire.book-count-home');
    }
}
