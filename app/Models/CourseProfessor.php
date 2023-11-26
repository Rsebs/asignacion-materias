<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseProfessor extends Model
{
    use HasFactory;

    protected $table = 'courses_professors';
    protected $fillable = [
        'id',
        'professor_id',
        'course_id'
    ];
}
