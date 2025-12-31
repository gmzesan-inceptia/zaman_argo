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
        
        $products = [
            ['title' => 'Ajwa Dates Premium', 'category' => 'Dates', 'image' => 'products/Ajwa.jpg', 'old_price' => 800, 'new_price' => 650, 'unit' => 'kg', 'tag' => 'featured'],
            ['title' => 'Medjool Dates Fresh', 'category' => 'Dates', 'image' => 'products/Medjool.jpg', 'old_price' => 950, 'new_price' => 750, 'unit' => 'kg', 'tag' => 'popular'],
            ['title' => 'Deglet Noor Dates', 'category' => 'Dates', 'image' => 'products/DegletNoor.jpg', 'old_price' => 600, 'new_price' => 500, 'unit' => 'kg', 'tag' => 'sale'],
            ['title' => 'Pure Desi Ghee', 'category' => 'Ghee', 'image' => 'products/Ghee.jpg', 'old_price' => 600, 'new_price' => 500, 'unit' => 'liter', 'tag' => 'featured'],
            ['title' => 'Cow Ghee Organic', 'category' => 'Ghee', 'image' => 'products/GheeOrganic.jpg', 'old_price' => 800, 'new_price' => 650, 'unit' => 'liter', 'tag' => 'new'],
            ['title' => 'Buffalo Ghee', 'category' => 'Ghee', 'image' => 'products/GheeBuffalo.jpg', 'old_price' => 700, 'new_price' => 550, 'unit' => 'liter', 'tag' => 'limited'],
            ['title' => 'Turmeric Powder', 'category' => 'Herbs', 'image' => 'products/Turmeric.jpg', 'old_price' => 400, 'new_price' => 300, 'unit' => 'kg', 'tag' => 'popular'],
            ['title' => 'Cumin Seeds', 'category' => 'Herbs', 'image' => 'products/Cumin.jpg', 'old_price' => 500, 'new_price' => 400, 'unit' => 'kg', 'tag' => 'featured'],
            ['title' => 'Coriander Powder', 'category' => 'Herbs', 'image' => 'products/Coriander.jpg', 'old_price' => 350, 'new_price' => 280, 'unit' => 'kg', 'tag' => 'new'],
            ['title' => 'Raw Acacia Honey', 'category' => 'Honey', 'image' => 'products/Honey.jpg', 'old_price' => 650, 'new_price' => 550, 'unit' => 'liter', 'tag' => 'featured'],
            ['title' => 'Multifloral Honey Pure', 'category' => 'Honey', 'image' => 'products/HoneyMulti.jpg', 'old_price' => 550, 'new_price' => 450, 'unit' => 'liter', 'tag' => 'popular'],
            ['title' => 'Manuka Honey Premium', 'category' => 'Honey', 'image' => 'products/HoneyManuka.jpg', 'old_price' => 1200, 'new_price' => 950, 'unit' => 'liter', 'tag' => 'limited'],
            ['title' => 'Almonds Premium', 'category' => 'Nuts', 'image' => 'products/Almonds.jpg', 'old_price' => 1200, 'new_price' => 950, 'unit' => 'kg', 'tag' => 'featured'],
            ['title' => 'Cashews Roasted', 'category' => 'Nuts', 'image' => 'products/Cashews.jpg', 'old_price' => 1400, 'new_price' => 1100, 'unit' => 'kg', 'tag' => 'popular'],
            ['title' => 'Walnuts Raw', 'category' => 'Nuts', 'image' => 'products/Walnuts.jpg', 'old_price' => 900, 'new_price' => 750, 'unit' => 'kg', 'tag' => 'new'],
        ];

        foreach ($products as $productData) {
            $category = Category::where('name', $productData['category'])->first();
            
            if ($category) {
                Product::create([
                    'category_id' => $category->id,
                    'title' => $productData['title'],
                    'slug' => Str::slug($productData['title']),
                    'image' => $productData['image'],
                    'description' => $faker->paragraph(5),
                    'old_price' => $productData['old_price'],
                    'new_price' => $productData['new_price'],
                    'unit' => $productData['unit'],
                    'tag' => $productData['tag'],
                ]);
            }
        }
    }
}
