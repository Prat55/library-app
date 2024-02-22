<?php

namespace App\Livewire;

use App\Models\Faculty as ModelsFaculty;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;

class Faculty extends Component
{
    use WithPagination;

    #[Rule('required')]
    public $faculty_name;
    public $f_name;

    public function add_faculty()
    {
        $validated = $this->validate();

        $validated['f_name'] = Str::replace(' ', '_', Str::lower($this->faculty_name));

        ModelsFaculty::create($validated);

        return redirect()->to('/faculty')->with('success', 'Faculty added successfully');
    }

    public function render()
    {
        return view('livewire.faculty', [
            'faculty' => ModelsFaculty::latest()->paginate(10)
        ]);
    }
}
