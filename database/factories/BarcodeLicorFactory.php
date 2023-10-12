<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BarcodeLicor>
 */
class BarcodeLicorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo' => fake()->unique()->numberBetween(0000000000000,1000000000000),
            'licor_id' => fake()->unique()->numberBetween(1,50)
        ];
    }
}
