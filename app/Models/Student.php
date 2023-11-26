<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'document',
        'names',
        'last_names',
        'phone',
        'email',
        'home_address',
        'city_id',
        'semester'
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'courses_students');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
