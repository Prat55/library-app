<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    protected function index()
    {
        return view('backend.books.addbook');
    }
}
