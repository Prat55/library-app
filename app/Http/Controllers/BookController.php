<?php

namespace App\Http\Controllers;

use App\Models\AssignBook;
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

    protected function teachers()
    {
        return view("backend.user-management.teachers");
    }

    protected function faculty()
    {
        return view("backend.faculty.faculty");
    }

    protected function contact()
    {
        return view('frontend.contact');
    }

    protected function profile()
    {
        return view('frontend.profile', [
            'issuedBook' => AssignBook::where('user_id', auth()->user()->id)->where('status', 'accepted')->first()
        ]);
    }
}
