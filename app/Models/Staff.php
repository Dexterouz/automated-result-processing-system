<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staff extends Authenticatable
{
    use HasFactory;

    protected $guard = 'staff';

    protected $table = 'staffs';

    protected $fillable = [
        'title',
        'first_name',
        'last_name',
        'staff_no',
        'email',
        'password',
        'phone',
        'gender',
        'department',
        'faculty',
        'level',
        'dob',
        'position',
        'address',
        'religion',
        'image',
    ];
}
