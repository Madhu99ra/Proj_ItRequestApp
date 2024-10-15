<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pending_request extends Model
{
    use HasFactory;

    protected $table = 'pending_requests'; 

    protected $fillable = [
        'username',
        'name',
        'reqdate',
        'issue',
        'attended_by',
        'resloved_date',
        'distribution',
        'remark',
        
    ];
}
