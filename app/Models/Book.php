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
        'featured',
        'published_at',
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id', 'id');
    }

    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeBsccs($query)
    {
        $query->where('faculty_id', '2');
    }

    public function scopeBscit($query)
    {
        $query->where('faculty_id', '3');
    }

    public function scopeBms($query)
    {
        $query->where('faculty_id', '4');
    }

    public function scopeBcom($query)
    {
        $query->where('faculty_id', '5');
    }

    public function scopeBaf($query)
    {
        $query->where('faculty_id', '6');
    }

    public function scopeBiotech($query)
    {
        $query->where('faculty_id', '7');
    }

    public function scopeMcom($query)
    {
        $query->where('faculty_id', '8');
    }

    public function scopeBbi($query)
    {
        $query->where('faculty_id', '9');
    }

    public function scopeFeatured($query)
    {
        $query->where('featured', true);
    }
}
