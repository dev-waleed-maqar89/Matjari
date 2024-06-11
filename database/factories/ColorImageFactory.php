<?php

namespace Database\Factories;

use App\Models\Color;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ColorImage>
 */
class ColorImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $colors = Color::pluck('id')->toArray();
        return [
            'color_id' => $this->faker->randomElement($colors),
            'image_id' => 1
        ];
    }
}
