<?php

namespace App\Livewire;

use App\Models\Faculty;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;

class Admins extends Component
{
    #[Url()]
    public $search = '';

    public function removeUser(int $user_id)
    {
        $user = User::findOrFail($user_id);

        $user->delete();
        return redirect()->to('/admins')->with('success', 'Admin account has been removed');
    }

    public function ban(int $user_id)
    {
        $user = User::findOrFail($user_id);

        $user->status = 'ban';
        $user->update();

        return redirect()->back()->with('success', 'Admin account has been banned');
    }

    public function unban(int $user_id)
    {
        $user = User::findOrFail($user_id);

        $user->status = 'active';
        $user->update();

        return redirect()->back()->with('success', 'Admin account has been banned');
    }

    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
    }

    public function render()
    {
        return view('livewire.admins', [
            'admins' => User::latest()
                ->where('name', 'like', "%{$this->search}%")
                ->orWhere('email', 'like', "%{$this->search}%")
                ->orWhere('phone', 'like', "%{$this->search}%")
                ->admins()
                ->paginate(10),
            'faculties' => Faculty::private()->latest()->get()
        ]);
    }
}

//? All logics are made by Pratik Desai
