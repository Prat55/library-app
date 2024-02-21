<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'message',
        'status',
    ];

    public function getShortMessage()
    {
        return Str::limit(strip_tags($this->message), 10);
    }

    public function scopeUnseen($query)
    {
        $query->where('status', 'unseen');
    }
}
