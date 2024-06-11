<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Size>
 */
class SizeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $products = Product::pluck('id')->toArrAy();
        $sizes = ['large', 'medium', 'small'];
        return [
            'product_id' => $this->faker->randomElement($products),
            'size' => $this->faker->randomElement($sizes),
        ];
    }
}
