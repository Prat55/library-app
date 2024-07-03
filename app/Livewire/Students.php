<?php

namespace App\Livewire;

use App\Models\AssignBook;
use App\Models\Faculty;
use App\Models\User;
use App\Models\UserHistory;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;

class Students extends Component
{

    #[Url()]
    public $search = '';

    public function removeUser(int $user_id)
    {
        $user = User::findOrFail($user_id);
        $assignBook = AssignBook::where('user_id', $user->id)->first();
        if (!$assignBook) {
            $userHistory = UserHistory::create([
                'old_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'faculty_id' => $user->faculty_id,
                'phone' => $user->phone,
                'profile_photo_path' => $user->profile_photo_path,
                'library_card' => $user->library_card
            ]);
            $userHistory->save();

            $user->delete();

            return redirect()->to('/students')->with('success', 'Student account has been removed');
        } else {
            return redirect()->to('/students')->with('error', 'Assign book is not collected from this student!');
        }
    }

    public function ban(int $user_id)
    {
        $user = User::findOrFail($user_id);

        $user->status = 'ban';
        $user->update();

        return redirect()->back()->with('success', 'Student account has been banned');
    }

    public function unban(int $user_id)
    {
        $user = User::findOrFail($user_id);

        $user->status = 'active';
        $user->update();

        return redirect()->back()->with('success', 'Student account has been banned');
    }

    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
    }

    public function render()
    {
        return view('livewire.students', [
            'students' => User::latest()
                ->where('name', 'like', "%{$this->search}%")
                ->orWhere('email', 'like', "%{$this->search}%")
                ->orWhere('phone', 'like', "%{$this->search}%")
                ->students()
                ->paginate(10),
            'faculties' => Faculty::private()->latest()->get()
        ]);
    }
}

//? All logics are made by Pratik Desai
