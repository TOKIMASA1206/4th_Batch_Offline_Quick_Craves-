<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MenuItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all available category IDs from the categories table
        $categoryIds = DB::table('categories')->pluck('id')->toArray();

        // Ensure there are category IDs to assign
        if (empty($categoryIds)) {
            $this->command->info('No categories found. Please seed categories first.');
            return;
        }

        for ($i = 1; $i <= 10; $i++) {

            $price = rand(100, 1000);
            $discountRates = [0.05, 0.10, 0.15];
            $discount = $discountRates[array_rand($discountRates)];

            $offer_price = $price * (1 - $discount);

            DB::table('menu_items')->insert([
                'item_image' => '/uploads/default-food-image.png',
                'name' => 'Menu Item ' . $i,
                'slug' => Str::slug('Menu Item ' . $i),
                'description' => 'This is the description for Menu Item ' . $i,
                'price' => $price,
                'offer_price' => round($offer_price, 2),
                'show_at_home' => 1,
                'status' => 1,
                'category_id' => $categoryIds[array_rand($categoryIds)],  // Assign random category_id
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
