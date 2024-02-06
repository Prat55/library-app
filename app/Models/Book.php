<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_token',
        'book_serial_number',
        'book_name',
        'book_author',
        'book_image_path',
        'book_pdf_path',
        'book_quantity',
        'book_description',
        'faculty_id',
        'published_at',
    ];

    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }
}
