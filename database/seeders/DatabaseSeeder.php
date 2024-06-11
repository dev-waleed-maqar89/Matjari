<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Product::factory(30)->create();
        // \App\Models\Size::factory(20)->create();
        // \App\Models\Color::factory(48)->create();
        // \App\Models\ColorImage::factory(120)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $products = Product::get();
        // foreach ($products as $product) {
        //     $size = Size::create([
        //         'size' => 'small',
        //         'product_id' => $product->id
        //     ]);
        //     Color::create([
        //         'size_id' => $size->id,
        //         'Color' => 'red',
        //         'price' => 120,
        //         'quantity' => 7,
        //         'main' => 1
        //     ]);
        //     Color::create([
        //         'size_id' => $size->id,
        //         'Color' => 'black',
        //         'price' => 140,
        //         'quantity' => 3,
        //         'main' => 0
        //     ]);
        // }
        for ($i = 1; $i <= 12; $i++) {
            $cat = Category::create([
                'name' => 'Main cat ' . $i
            ]);
            foreach (range('a', 'e') as $l) {
                Category::create([
                    'name' => 'Sub cat ' . $l . ' ' . $i,
                    'parent_id' => $cat->id
                ]);
            }
        }
    }
}
