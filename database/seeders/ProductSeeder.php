<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            Product::create([
                'title' => fake()->word(),
                'description' => fake()->sentence(10),
                'category_id' => $category->getId(),
                'price' => fake()->randomFloat(2, 100, 1000)
            ]);
        }
    }
}
