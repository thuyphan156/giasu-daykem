<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

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
        'time',
        'salary',
        'note'
    ];
}
