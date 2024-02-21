<?php

namespace App\Livewire;

use App\Models\Faculty;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Students extends Component
{
    #[Rule('required|min:3')]
    public $name;
    #[Rule('required|unique:' . User::class)]
    public $email;
    public $pass;
    #[Rule('required|min:10|max:10')]
    public $phone;
    #[Rule('required')]
    public $faculty_id;

    public function addStudent()
    {
        $validated = $this->validate();
        $validated['password'] = Hash::make($this->pass);

        User::create($validated);
        return redirect()->back()->with('success', 'Student has been added successfully');
    }

    public function removeUser(int $user_id)
    {
        $user = User::findOrFail($user_id);

        $user->delete();
        return redirect()->back()->with('success', 'Student account has been removed');
    }

    public function render()
    {
        return view('livewire.students', [
            'students' => User::students()->latest()->paginate(10),
            'faculties' => Faculty::private()->latest()->get()
        ]);
    }
}
