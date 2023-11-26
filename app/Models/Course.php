<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description',
        'credits',
        'elective',
        'knowledge_area',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'courses_students');
    }

    public function professors()
    {
        return $this->belongsToMany(Professor::class, 'courses_professors');
    }
}
