<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FineController extends Controller
{
    protected function index()
    {
        return view('backend.fine-management.fines');
    }
}
