<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Professor;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseStudent>
 */
class CourseStudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student_id' => Student::inRandomOrder()->first(),
            'course_id' => Course::inRandomOrder()->first(),
        ];
    }
}
