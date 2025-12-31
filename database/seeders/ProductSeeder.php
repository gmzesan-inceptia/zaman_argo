<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\SubCategory;
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
        $subcategories = SubCategory::all();

        foreach ($subcategories as $subcategory) {
            for ($i = 1; $i <= 3; $i++) {
                Product::create([
                    'title' => ucfirst($faker->words(rand(1,3), true)),
                    'category_id' => $subcategory->category_id,
                    'subcategory_id' => $subcategory->id,
                    'slug' => '',
                    'image' => 'products/default.jpg',
                    'description' => implode("\n", $faker->paragraphs(3)),
                    'old_price' => $faker->randomFloat(2, 50, 200),
                    'new_price' => $faker->randomFloat(2, 20, 100),
                ]);
            }
        }
    }
}
