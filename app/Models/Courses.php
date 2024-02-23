<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{

     protected $fillable = [ 
        'title',
        'description',
        'duration',
        'start_date',
        'prize',
        'course_author',
        'image',

    ];
     protected $primaryKey = 'id';
    use HasFactory;
}
