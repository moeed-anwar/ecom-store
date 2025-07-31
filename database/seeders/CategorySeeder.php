<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         $categories = [
    [
        'name' => 'Men',
        'description' => 'Clothing, footwear, and accessories for men',
    ],
    [
        'name' => 'Women',
        'description' => 'Trendy apparel and fashion for women',
    ],
    [
        'name' => 'Kids',
        'description' => 'Clothes and essentials for boys and girls',
    ],
    [
        'name' => 'Footwear',
        'description' => 'Shoes, sneakers, sandals, and boots',
    ],
    [
        'name' => 'Accessories',
        'description' => 'Bags, belts, hats, jewelry, and more',
    ],
    [
        'name' => 'Activewear',
        'description' => 'Comfortable clothing for workouts and sports',
    ],
    [
        'name' => 'Winter Wear',
        'description' => 'Jackets, hoodies, sweaters, and thermal wear',
    ],
    [
        'name' => 'Summer Collection',
        'description' => 'Lightweight and breathable clothing for summer',
    ],
];


        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
            ]);
        }
    }
}
