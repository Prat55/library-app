<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class Header extends Component
{

    public function darkMode(int $user_id)
    {
        $user = User::findOrFail($user_id);

        $user->mode = 'dark';
        $user->update();
    }

    public function lightMode(int $user_id)
    {
        $user = User::findOrFail($user_id);

        $user->mode = 'light';
        $user->update();
    }

    public function render()
    {
        return view(
            'livewire.header',
            ['messages' => Message::unseen()->latest()->paginate(6)]
        );
    }
}
