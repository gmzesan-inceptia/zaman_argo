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
            ['name' => 'Dates', 'description' => 'Premium dates sourced from trusted growers - Medjool, Ajwa, Deglet Noor and more', 'image' => '/frontend/img/category/ajwa.png'],
            ['name' => 'Ghee', 'description' => 'Pure, clarified butter - ideal for cooking and traditional recipes', 'image' => '/frontend/img/category/ghee.png'],
            ['name' => 'Herbs', 'description' => 'Organic herbs and spices for culinary and medicinal use', 'image' => '/frontend/img/category/herbs.png'],
            ['name' => 'Honey', 'description' => 'Raw, pure honey with natural health benefits', 'image' => '/frontend/img/category/honey.png'],
            ['name' => 'Nuts', 'description' => 'Assorted premium nuts - almonds, cashews, walnuts and more', 'image' => '/frontend/img/category/nuts.png'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
