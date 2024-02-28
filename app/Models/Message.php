<?php

namespace App\Models;

use Carbon\Carbon;
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
        'created_at'
    ];

    public function getShortMessage()
    {
        return Str::limit(strip_tags($this->message), 10);
    }

    public function scopeUnseen($query)
    {
        $query->where('status', 'unseen');
    }

    public function scopeToday($query)
    {
        $query->where('received_at', Carbon::today());
    }
}
