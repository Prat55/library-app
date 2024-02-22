<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'faculty_name',
        'f_name',
        'type',
    ];

    public function scopePrivate($query)
    {
        $query->where('type', 'private');
    }
}
