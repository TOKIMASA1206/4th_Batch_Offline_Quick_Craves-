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
        for ($i = 1; $i <= 10; $i++) {

            $price = rand(100, 1000);
            $discountRates = [0.05, 0.10, 0.15];
            $discount = $discountRates[array_rand($discountRates)];

            $offer_price = $price * (1 - $discount);

            DB::table('menu_items')->insert([
                'name' => 'Menu Item ' . $i,
                'slug' => Str::slug('Menu Item ' . $i),
                'item_image' => '/uploads/default-food-image.png',
                'description' => 'This is the description for Menu Item ' . $i,
                'price' => $price,
                'offer_price' => round($offer_price, 2),
                'show_at_home' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
