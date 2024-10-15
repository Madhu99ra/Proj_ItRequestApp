<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_registration extends Model
{
    use HasFactory;

    protected $table = 'users_registrations'; 

    protected $fillable = [
        'username',
        'email',
        'password',
        'name',
        'department',
        'post',
        'role'
    ];
}
