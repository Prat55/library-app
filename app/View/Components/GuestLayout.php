<?php

namespace App\View\Components;

use App\Models\Faculty;
use Illuminate\View\Component;
use Illuminate\View\View;
use Livewire\Attributes\Computed;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    #[Computed()]
    public function faculties()
    {
        return Faculty::private()
            ->get();
    }

    public function render(): View
    {
        return view('layouts.guest');
    }
}
