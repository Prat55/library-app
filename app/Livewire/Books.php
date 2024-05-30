<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class Books extends Component
{
    #[Url()]
    public $fid;

    #[Url()]
    public $search;

    public function setLang($fid)
    {
        $this->fid = $fid;
    }

    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
    }

    #[Computed()]
    public function searchData()
    {
        return Book::latest()
            ->where('book_name', 'like', "%{$this->search}%")
            ->orWhere('book_author', 'like', "%{$this->search}%")
            ->get();
    }

    #[Computed()]
    public function books()
    {
        return Book::latest()
            ->published()
            ->get();
    }

    public function render()
    {
        return view('livewire.books');
    }
}
