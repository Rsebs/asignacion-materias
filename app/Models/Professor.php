<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
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
        'city_id'
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'courses_professors');
    }


    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
