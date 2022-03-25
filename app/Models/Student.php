<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Authenticatable
{
    use HasFactory;

    protected $guard = 'student';

    protected $fillable = [
        'first_name',
        'last_name',
        'matric_no',
        'email',
        'password',
        'phone',
        'gender',
        'department',
        'faculty',
        'level',
        'dob',
        'programme',
        'address',
        'religion',
        'image',
    ];

    public function registeredCourses()
    {
        return $this->hasMany(RegisteredCourse::class);
    }
}
