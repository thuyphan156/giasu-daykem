<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterTeacher extends Model
{
    use HasFactory;

    protected $table = 'register_teachers';

    protected $fillable = [
        'name',
        'email',
        'province_id',
        'district_id',
        'address',
        'phone',
        'class_id',
        'subject_id',
        'students',
        'students',
        'time',
        'salary',
        'note',
        'teacher_id',
    ];
}
