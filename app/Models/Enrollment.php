<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{


     protected $fillable = [ 
        'name',
        'email',
        'password',
        'confirm_password',
        'course_id',
       

    ];
    use HasFactory;
}
