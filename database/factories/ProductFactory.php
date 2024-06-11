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
            'name' => fake()->text(12),
            'description' => fake()->text(50),
            'options' => '{"1":{"property":"Ullamco delectus de","value":"Accusamus provident"},"2":{"property":"Excepteur quod eveni","value":"Vitae Nam ex omnis c"},"3":{"property":"Ex eos mollit eveni","value":"Qui omnis in nisi id"},"4":{"property":"Rerum mollitia facil","value":"A ut culpa deserunt"},"5":{"property":"Et voluptate dolorem","value":"Sit voluptatem id e"}}'
        ];
    }
}