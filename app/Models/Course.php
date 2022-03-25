<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'course_code',
        'course_title',
        'unit_load',
        'level',
        'semester',
    ];

    public function registeredCourses()
    {
        return $this->hasMany(RegisteredCourse::class);
    }
}
