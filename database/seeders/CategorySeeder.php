<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Pizza', 'slug' => Str::slug('Pizza'), 'show_at_home' => true, 'status' => true],
            ['name' => 'Burgers', 'slug' => Str::slug('Burgers'), 'show_at_home' => true, 'status' => true],
            ['name' => 'Sushi', 'slug' => Str::slug('Sushi'), 'show_at_home' => false, 'status' => true],
            ['name' => 'Salads', 'slug' => Str::slug('Salads'), 'show_at_home' => true, 'status' => true],
            ['name' => 'Desserts', 'slug' => Str::slug('Desserts'), 'show_at_home' => false, 'status' => true],
            ['name' => 'Beverages', 'slug' => Str::slug('Beverages'), 'show_at_home' => true, 'status' => true],
            ['name' => 'Pasta', 'slug' => Str::slug('Pasta'), 'show_at_home' => false, 'status' => true],
            ['name' => 'Seafood', 'slug' => Str::slug('Seafood'), 'show_at_home' => false, 'status' => true],
            ['name' => 'Steak', 'slug' => Str::slug('Steak'), 'show_at_home' => false, 'status' => true],
            ['name' => 'Vegan', 'slug' => Str::slug('Vegan'), 'show_at_home' => true, 'status' => true],
        ]);
    }
}
