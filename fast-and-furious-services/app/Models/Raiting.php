<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raiting extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_and_time',
        'user',
        'mechanic',
        'service',
        'rating',
        'note'
    ];
}
