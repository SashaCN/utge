<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->state(),
            'description' => $this->faker->text($maxNbChars = 200),
            'article' => $this->faker->text($maxNbChars = 10),
            'price' => $this->faker->buildingNumber(),
            'shipable' => $this->faker->boolean(),
            'available' => $this->faker->boolean(),
            'max_order' => $this->faker->randomDigit(),
            'list_position' => $this->faker->randomDigit(),
        ];
    }
}
