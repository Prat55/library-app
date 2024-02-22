<?php

namespace App\Livewire;

use App\Models\Faculty;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Teachers extends Component
{
    use WithPagination;

    #[Rule('required|min:3')]
    public $name;
    #[Rule('required|unique:' . User::class)]
    public $email;
    public $pass;
    #[Rule('required|min:10|max:10')]
    public $phone;
    #[Rule('required')]
    public $faculty_id;
    #[Rule('required')]
    public $role = 'teacher';

    public function addTeacher()
    {
        $validated = $this->validate();
        $validated['password'] = Hash::make($this->pass);

        User::create($validated);
        return redirect()->to('/teachers')->with('success', 'Student has been added successfully');
    }

    public function removeUser(int $user_id)
    {
        $user = User::findOrFail($user_id);

        $user->delete();
        return redirect()->to('/teachers')->with('success', 'Student account has been removed');
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

    public function render()
    {
        return view('livewire.teachers', [
            'teachers' => User::teachers()->latest()->paginate(10),
            'faculties' => Faculty::private()->latest()->get()
        ]);
    }
}
