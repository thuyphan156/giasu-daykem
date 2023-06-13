<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'id',
        'class_id',
        'subject_id',
        'number_sessions',
        'minutes',
        'days',
        'time',
        'address',
        'salary',
        'fee',
        'note',
        'contact_id',
        'students',
    ];
}
