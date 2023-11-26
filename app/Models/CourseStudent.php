<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    use HasFactory;

    protected $table = 'courses_students';
    protected $fillable = [
        'id',
        'student_id',
        'course_id'
    ];
}
