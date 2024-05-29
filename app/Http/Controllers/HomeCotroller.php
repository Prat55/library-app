<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeCotroller extends Controller
{
    public function home()
    {
        return view(
            'frontend.home',
            [
                'bsccsbooks' => Book::latest()->bsccs()->published()->paginate(3),
                'bafbooks' => Book::latest()->baf()->published()->paginate(3),
                'bmsbooks' => Book::latest()->bms()->published()->paginate(3),
                'bscitbooks' => Book::latest()->bscit()->published()->paginate(3),
                'featuredBooks' => Book::latest()->featured()->published()->paginate(5),
                'bcombooks' => Book::latest()->bcom()->published()->paginate(3),
                'bbibooks' => Book::latest()->bbi()->published()->paginate(3),

            ]
        );
    }
}
