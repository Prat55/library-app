<?php

namespace App\Livewire;

use App\Models\Message;
use Livewire\Component;

class DashboardMessage extends Component
{
    public function render()
    {
        return view('livewire.dashboard-message', [
            'messages' => Message::today()->unseen()->latest()->paginate(6)
        ]);
    }
}
