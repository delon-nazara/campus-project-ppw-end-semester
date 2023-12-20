<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class NilaiFactory extends Factory
{
    public function definition(): array
    {
        return [
            'huruf' => fake()->randomElement(['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'B', 'B', 'B', 'B', 'B', 'B', 'B', 'B', 'C', 'C', 'C', 'C', 'C', 'D', 'D', 'D', 'E'])
        ];
    }
}
