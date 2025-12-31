<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SubcategorySeeder extends Seeder
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
                SubCategory::create([
                    'name' => ucfirst($faker->words(rand(1,2), true)),
                    'category_id' => $category->id,
                    'description' => implode("\n", $faker->paragraphs(1)),
                ]);
            }
        }
    }
}
