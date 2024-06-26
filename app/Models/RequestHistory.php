<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'start_date',
        'end_date',
        'status',
    ];

    public function scopeRequests($query)
    {
        $query->where('status', 'request');
    }

    public function scopeAccepted($query)
    {
        $query->where('status', 'accepted');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function oldUser()
    {
        return $this->belongsTo(UserHistory::class, 'user_id', 'old_id');
    }
}
