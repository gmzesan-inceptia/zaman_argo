<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Electronics', 'description' => 'Electronic gadgets and devices'],
            ['name' => 'Books', 'description' => 'Various kinds of books'],
            ['name' => 'Clothing', 'description' => 'Apparel and garments'],
            ['name' => 'Home & Kitchen', 'description' => 'Household and kitchen items'],
            ['name' => 'Sports', 'description' => 'Sporting goods and outdoor equipment'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
