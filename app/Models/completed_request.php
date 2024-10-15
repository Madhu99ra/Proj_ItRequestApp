<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class completed_request extends Model
{
    use HasFactory;

    protected $fillable = [
        'username', // Add username to the fillable array
        'name',
        'reqdate',
        'issue',
        'attended_by',
        'resloved_date',
        'distribution',
        'remark',
        
    ];
}
