<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Professor>
 */
class ProfessorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'document' => $this->faker->unique()->numerify('##########'),
            'names' => $this->faker->firstName(),
            'last_names' => $this->faker->lastName(),
            'phone' => $this->faker->numerify('##########'),
            'email' => $this->faker->unique()->safeEmail(),
            'home_address' => $this->faker->address(),
            'city_id' => City::inRandomOrder()->first(),
        ];
    }
}
