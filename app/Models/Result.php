<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'course_code',
        'course_title',
        'unit_load',
        'level',
        'semester',
        'session',
        'matric_no',
        'exam_score',
        'ca_score',
        'grade',
    ];
}
