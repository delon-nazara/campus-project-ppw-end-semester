<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class MataKuliahFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama' => fake()->sentence(fake()->numberBetween(2, 3)),
            'sks' => fake()->numberBetween(2, 3)
        ];
    }
}
