<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pname' => fake()->text(15),
            'pprice' => fake()->numberBetween(5 , 10000),
            'pcat' => fake()->word(),
            'pdesc' => fake()->paragraph(100)
        ];
    }
}
