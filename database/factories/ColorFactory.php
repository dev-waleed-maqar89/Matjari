<?php

namespace Database\Factories;

use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Color>
 */
class ColorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sizes = Size::pluck('id')->toArray();
        $colors = ['red', 'black', 'white', 'blue', 'green'];
        return [
            'size_id' => $this->faker->randomElement($sizes),
            'Color' => $this->faker->randomElement($colors),
            'price' => rand(90, 110),
            'quantity' => rand(1, 7)
        ];
    }
}
