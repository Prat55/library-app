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

    protected function assign_request()
    {
        return view('backend.books.assign-book-request');
    }

    protected function issued_books()
    {
        return view('backend.books.issued-books');
    }

    protected function students()
    {
        return view("backend.user-management.students");
    }
}
