<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personel extends Authenticatable
{
    use HasFactory;

    protected $guard = "personel";

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'password',
        'phone',
        'account_status',
        'image',
    ];
}
