<?php

namespace App\Http\Controllers;

use App\Models\AssignBook;
use App\Models\Book;
use App\Models\Faculty;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected function index()
    {
        return view('backend.books.addbook');
    }

    protected function manage_books()
    {
        return view('backend.books.manage-books');
    }

    protected function assign_request()
    {
        return view('backend.books.assign-book-request');
    }

    protected function issued_books()
    {
        return view('backend.books.issued-books');
    }

    protected function faculty()
    {
        return view("backend.faculty.faculty");
    }

    protected function contact()
    {
        return view('frontend.contact');
    }

    protected function edit_book($token)
    {
        $book = Book::where('book_token', $token)->first();
        $faculties = Faculty::all();
        return view('backend.books.editBook', compact('book', 'faculties'));
    }

    protected function update_book($token, Request $request)
    {
        $book = Book::where('book_token', $token)->first();

        $book->book_name = $request->book_name;
        $book->book_author = $request->author_name;
        $book->faculty_id = $request->faculty;
        $book->book_description = $request->description;
        if ($request->book_image) {
            $book->book_image_path = $request->book_image->store('book-images', 'public');
        }
        if ($request->book_pdf) {
            $book->book_pdf_path = $request->book_pdf->store('book-pdfs', 'public');
        }
        $book->book_quantity = $request->quantity;
        $book->published_at = $request->published_at;
        $book->update();

        return redirect()->route('manage-books')->with('success', 'Book updated successfully');
    }

    protected function books()
    {
        return view('frontend.books');
    }

    protected function issued_history()
    {
        return view('backend.books.requests-history');
    }
}
