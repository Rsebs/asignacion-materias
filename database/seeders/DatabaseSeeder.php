<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\City;
use App\Models\Course;

use App\Models\Professor;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        City::factory(30)->create();
        Course::factory(15)->create();
        Student::factory(30)->create()->each(
            fn($student) => $student->courses()->sync(Course::all()->random(3))
        );
        Professor::factory(30)->create()->each(
            fn($professor) => $professor->courses()->sync(Course::all()->random(3))
        );
    }
}
