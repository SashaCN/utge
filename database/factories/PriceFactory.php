<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'list_price' => $this->faker->buildingNumber(),
            'cost' => $this->faker->buildingNumber(),
            'sell_price' => $this->faker->buildingNumber(),
        ];
    }
}
