<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'overdue_days',
        'total_amount',
        'status',
    ];

    public function scopeUnpaid($query)
    {
        $query->where('status', 'unpaid');
    }

    public function scopePaid($query)
    {
        $query->where('status', 'paid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}
