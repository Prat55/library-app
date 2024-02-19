<?php

namespace App\Livewire;

use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ManageBook extends Component
{

    use WithPagination;
    use WithFileUploads;

    public $book_id;
    public $book_name;
    public $book_author;
    public $book_description;
    public $book_quantity;
    public $oldImage;
    public $oldPdf;
    public $image = null;
    public $pdf = null;
    public $book_serial_number;
    public $published_at;
    public $new_image_path;
    public $new_pdf_path;

    public function editBook(int $book_id)
    {
        $book = Book::find($book_id);

        if ($book) {
            $this->book_id = $book->id;
            $this->book_name = $book->book_name;
            $this->book_author = $book->book_author;
            $this->book_description = $book->book_description;
            $this->book_quantity = $book->book_quantity;
            $this->oldImage = $book->book_image_path;
            $this->oldPdf = $book->book_pdf_path;
            $this->book_serial_number = $book->book_serial_number;
            $this->published_at = $book->published_at;
        } else {
            abort(404);
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

    public function updateBook(int $book_id)
    {
        $book = Book::find($book_id);
        if ($book) {

            if ($this->image) {
                if ($this->oldImage) {
                    $this->oldImage->delete();
                }
                $this->new_image_path = $this->image->store('book_images', 'public');
            }

            if ($this->pdf) {
                if ($this->oldPdf) {
                    $this->oldPdf->delete();
                }

                $this->new_pdf_path = $this->pdf->store('book_pdfs', 'public');
            }

            $book->book_name = $this->book_name;
            $book->book_author = $this->book_author;
            $book->book_serial_number = $this->book_serial_number;
            $book->book_description = $this->book_description;
            $book->book_quantity = $this->book_quantity;
            $book->book_image_path = $this->new_image_path ?: $this->oldImage;
            $book->book_pdf_path = $this->new_pdf_path ?: $this->oldPdf;
            $book->update();

            return redirect()->back()->with('success', 'Book updated successfully');
        } else {
            abort(404);
        }
    }

    public function removeBook(int $book_id)
    {
        $book = Book::find($book_id);
        if ($book) {
            if ($book->book_image_path) {
                Storage::disk('public')->delete($book->book_image_path);
            }

            $book->delete();

            return redirect()->back()->with("success", "Book deleted successfully");
        } else {
            abort(404);
        }
    }

    public function featuredBook(int $book_id)
    {
        $book = Book::find($book_id);

        if ($book) {
            $book->featured = 1;
            $book->update();

            return redirect()->back()->with('success', 'Book is now featured');
        } else {
            abort(404);
        }
    }

    public function rmfeaturedBook(int $book_id)
    {
        $book = Book::find($book_id);

        if ($book) {

            $book->featured = 0;
            $book->update();

            return redirect()->back()->with('success', 'Book is removed from featured');
        } else {
            abort(404);
        }
    }

    public function render()
    {
        return view('livewire.manage-book', [
            'books' => Book::published()->latest()->paginate(8),
        ]);
    }
}
