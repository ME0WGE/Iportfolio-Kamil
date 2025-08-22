<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\About>
 */
class AboutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subtitle' => $this->faker->text(15),

            'birthdate' => $this->faker->dateTimeBetween(),

            'website' => 'website.com',

            'phone' => $this->faker->phoneNumber(),

            'city' => $this->faker->city(),

            'age' => '30',

            'degree' => 'degree',

            'email' => $this->faker->email(),

            'freelance' => 'freelance status',

            'subtext' => $this->faker->text(50),
        ];
    }
}
