<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $electronics = Category::create([
            'name' => 'Electronics',
            'parent_id' => null,
        ]);

        $clothing = Category::create([
            'name' => 'Clothing',
            'parent_id' => null,
        ]);

        $homeAndLiving = Category::create([
            'name' => 'Home & Living',
            'parent_id' => null,
        ]);

        Category::create([
            'name' => 'Laptops',
            'parent_id' => $electronics->id,
        ]);

        Category::create([
            'name' => 'Smartphones',
            'parent_id' => $electronics->id,
        ]);

        Category::create([
            'name' => 'Men\'s Clothing',
            'parent_id' => $clothing->id,
        ]);

        Category::create([
            'name' => 'Women\'s Clothing',
            'parent_id' => $clothing->id,
        ]);

        Category::create([
            'name' => 'Furniture',
            'parent_id' => $homeAndLiving->id,
        ]);

        Category::create([
            'name' => 'Kitchen Appliances',
            'parent_id' => $homeAndLiving->id,
        ]);
    }
}
