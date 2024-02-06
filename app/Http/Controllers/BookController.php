<?php

namespace App\Http\Controllers;

use App\Models\Book;
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

    protected function quick_view($id)
    {
        $book = Book::find($id);

        if ($book) {
            return response()->json([
                'status' => 200,
                'book' => $book
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Book not found!'
            ]);
        }
    }
}
