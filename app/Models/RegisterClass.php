<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterClass extends Model
{
    use HasFactory;

    protected $table = 'register_classes';

    protected $fillable = [
        'post_id',
        'teacher_id',
        'status'
    ];
}
