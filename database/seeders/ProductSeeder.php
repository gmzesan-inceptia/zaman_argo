<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $categories = Category::all();

        foreach ($categories as $category) {
            for ($i = 1; $i <= 3; $i++) {
                $title = ucfirst($faker->words(rand(1,3), true));
                Product::create([
                    'title' => $title,
                    'category_id' => $category->id,
                    'slug' => Str::slug($title),
                    'image' => 'products/default.jpg',
                    'description' => implode("\n", $faker->paragraphs(3)),
                    'old_price' => $faker->randomFloat(2, 50, 200),
                    'new_price' => $faker->randomFloat(2, 20, 100),
                ]);
            }
        }
    }
}
