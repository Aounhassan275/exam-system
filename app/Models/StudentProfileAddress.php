<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProfileAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'student_profile_id',
        'state',
        'landmark',
        'city',
        'lane',
        'country',
        'address',
        'town',
        'pin',
        'type',
    ];

}
