<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'college_id',
        'course_id',
        'semester_id',
        'enrollment_year',
        'roll_number',
        'phone',
        'fathers_name',
        'mother_name',
        'blood_group',
        'date_of_birth',
        'gender',
        'nationality'
    ];

    public function student()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function college()
    {
        return $this->belongsTo(User::class,'college_id');
    }
}
