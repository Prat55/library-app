<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Faculty;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Nette\Utils\Random;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;

class AddBook extends Component
{
    use \Livewire\WithFileUploads;

    public $message = [
        'status' => '',
        'message' => ''
    ];

    #[Rule('required|min:3')]
    public $book_serial_number;

    #[Rule('required|min:5|max:100')]
    public $book_name;

    #[Rule('required|min:1|max:50')]
    public $book_author;

    #[Rule('required|min:1')]
    public $book_quantity;

    #[Rule('nullable|sometimes|max:10000')]
    public $book_description;

    #[Rule('required|image|max:4028')]
    public $image = null;

    #[Rule('nullable|sometimes|file|max:4028')]
    public $pdf  = null;

    #[Rule('required')]
    public $published_at;

    #[Rule('required')]
    public $faculty_id = 1;

    public $book_token;

    public function book_token()
    {
        do {
            $token = substr(md5(mt_rand()), 0, 40);
        } while (Book::where("book_token", "=", $token)->first());

        return $token;
    }

    public function add_book()
    {
        $validated = $this->validate();

        if ($this->image) {
            $validated['book_image_path'] = $this->image->store('book-images', 'public');

            if ($this->pdf) {
                $validated['book_pdf_path'] = $this->pdf->store('book-pdfs', 'public');
            }

            $validated['book_token'] = $this->book_token = $this->book_token();

            Book::create($validated);

            $this->clear();
            return $this->message = [
                'status' => '200',
                'message' => 'Book added'
            ];
        } else {
            return $this->message = [
                'status' => '404',
                'message' => 'Please select book image'
            ];
        }
    }

    public function clear()
    {
        $this->reset(
            'book_serial_number',
            'book_name',
            'book_author',
            'book_quantity',
            'book_description',
            'image',
            'pdf',
            'published_at'
        );
    }

    public function render()
    {
        return view('livewire.add-book', [
            'faculties' => Faculty::latest()->get()
        ]);
    }
}
