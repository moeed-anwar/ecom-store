<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
               $categories = Category::all();

        if ($categories->isEmpty()) {
            $this->command->error('No categories found. Please run CategorySeeder first.');
            return;
        }

       $products = [
    // Men
    [
        'name' => 'Men’s Classic Shirt',
        'description' => 'Elegant button-down shirt for formal occasions',
        'price' => 34.99,
        'category' => 'Men',
        'image' => 'assets/white-t-shirt-with-black-sleeves.jpg',
        'is_active' => true,
        'stock' => 60,
    ],
    [
        'name' => 'Men’s Denim Jacket',
        'description' => 'Stylish denim jacket for everyday wear',
        'price' => 59.99,
        'category' => 'Men',
        'is_active' => true,
        'stock' => 40,
    ],
    [
        'name' => 'Men’s Chino Pants',
        'description' => 'Comfortable and versatile chino trousers',
        'price' => 44.99,
        'category' => 'Men',
        'is_active' => true,
        'stock' => 70,
    ],
    [
        'name' => 'Men’s Hoodie',
        'description' => 'Warm and casual hoodie with front pockets',
        'price' => 39.99,
        'category' => 'Men',
        'is_active' => true,
        'stock' => 80,
    ],

    // Women
    [
        'name' => 'Women’s Floral Dress',
        'description' => 'Flowy dress with floral print for casual outings',
        'price' => 49.99,
        'category' => 'Women',
        'is_active' => true,
        'stock' => 50,
    ],
    [
        'name' => 'Women’s Blouse',
        'description' => 'Elegant blouse suitable for office or casual wear',
        'price' => 29.99,
        'category' => 'Women',
        'is_active' => true,
        'stock' => 60,
    ],
    [
        'name' => 'Women’s High Waist Jeans',
        'description' => 'Trendy high waist jeans for everyday wear',
        'price' => 54.99,
        'category' => 'Women',
        'is_active' => true,
        'stock' => 75,
    ],
    [
        'name' => 'Women’s Cardigan',
        'description' => 'Soft knit cardigan with open front',
        'price' => 42.99,
        'category' => 'Women',
        'is_active' => true,
        'stock' => 35,
    ],

    // Kids
    [
        'name' => 'Kids T-Shirt Pack',
        'description' => 'Pack of 3 colorful cotton t-shirts',
        'price' => 24.99,
        'category' => 'Kids',
        'is_active' => true,
        'stock' => 90,
    ],
    [
        'name' => 'Kids Winter Jacket',
        'description' => 'Warm and padded winter coat for kids',
        'price' => 64.99,
        'category' => 'Kids',
        'is_active' => true,
        'stock' => 30,
    ],
    [
        'name' => 'Kids Denim Shorts',
        'description' => 'Comfortable denim shorts for everyday play',
        'price' => 19.99,
        'category' => 'Kids',
        'is_active' => true,
        'stock' => 70,
    ],
    [
        'name' => 'Kids Sneakers',
        'description' => 'Stylish and durable sneakers for boys and girls',
        'price' => 34.99,
        'category' => 'Kids',
        'is_active' => true,
        'stock' => 50,
    ],

    // Footwear
    [
        'name' => 'White Sneakers',
        'description' => 'Minimalist white sneakers for daily wear',
        'price' => 59.99,
        'category' => 'Footwear',
        'is_active' => true,
        'stock' => 80,
    ],
    [
        'name' => 'Formal Leather Shoes',
        'description' => 'Elegant leather shoes for formal events',
        'price' => 89.99,
        'category' => 'Footwear',
        'is_active' => true,
        'stock' => 45,
    ],
    [
        'name' => 'Casual Slip-ons',
        'description' => 'Easy to wear slip-ons for casual days',
        'price' => 39.99,
        'category' => 'Footwear',
        'is_active' => true,
        'stock' => 55,
    ],
    [
        'name' => 'Running Shoes',
        'description' => 'Comfortable and breathable running shoes',
        'price' => 69.99,
        'category' => 'Footwear',
        'is_active' => true,
        'stock' => 65,
    ],

    // Accessories
    [
        'name' => 'Leather Belt',
        'description' => 'Classic genuine leather belt',
        'price' => 19.99,
        'category' => 'Accessories',
        'is_active' => true,
        'stock' => 120,
    ],
    [
        'name' => 'Wool Beanie',
        'description' => 'Cozy wool beanie for cold days',
        'price' => 14.99,
        'category' => 'Accessories',
        'is_active' => true,
        'stock' => 90,
    ],
    [
        'name' => 'Sunglasses',
        'description' => 'Stylish UV-protection sunglasses',
        'price' => 29.99,
        'category' => 'Accessories',
        'is_active' => true,
        'stock' => 70,
    ],
    [
        'name' => 'Canvas Tote Bag',
        'description' => 'Reusable tote bag with trendy print',
        'price' => 12.99,
        'category' => 'Accessories',
        'is_active' => true,
        'stock' => 110,
    ],

    // Activewear
    [
        'name' => 'Yoga Leggings',
        'description' => 'Stretchy and breathable leggings for yoga',
        'price' => 34.99,
        'category' => 'Activewear',
        'is_active' => true,
        'stock' => 80,
    ],
    [
        'name' => 'Gym Tank Top',
        'description' => 'Moisture-wicking tank top for workouts',
        'price' => 22.99,
        'category' => 'Activewear',
        'is_active' => true,
        'stock' => 100,
    ],
    [
        'name' => 'Running Shorts',
        'description' => 'Lightweight shorts for jogging and exercise',
        'price' => 26.99,
        'category' => 'Activewear',
        'is_active' => true,
        'stock' => 75,
    ],
    [
        'name' => 'Athletic Hoodie',
        'description' => 'Fleece-lined hoodie for gym or outdoor wear',
        'price' => 49.99,
        'category' => 'Activewear',
        'is_active' => true,
        'stock' => 60,
    ],

    // Winter Wear
    [
        'name' => 'Puffer Jacket',
        'description' => 'Windproof and insulated winter puffer jacket',
        'price' => 99.99,
        'category' => 'Winter Wear',
        'is_active' => true,
        'stock' => 30,
    ],
    [
        'name' => 'Woolen Scarf',
        'description' => 'Soft and thick wool scarf for winter',
        'price' => 24.99,
        'category' => 'Winter Wear',
        'is_active' => true,
        'stock' => 90,
    ],
    [
        'name' => 'Thermal Leggings',
        'description' => 'Insulated leggings to keep you warm',
        'price' => 29.99,
        'category' => 'Winter Wear',
        'is_active' => true,
        'stock' => 65,
    ],
    [
        'name' => 'Fleece Pullover',
        'description' => 'Warm fleece pullover for chilly days',
        'price' => 39.99,
        'category' => 'Winter Wear',
        'is_active' => true,
        'stock' => 50,
    ],

    // Summer Collection
    [
        'name' => 'Linen Shirt',
        'description' => 'Breathable linen shirt for summer heat',
        'price' => 32.99,
        'category' => 'Summer Collection',
        'is_active' => true,
        'stock' => 55,
    ],
    [
        'name' => 'Shorts Set',
        'description' => 'Matching shorts and top set for summer',
        'price' => 39.99,
        'category' => 'Summer Collection',
        'is_active' => true,
        'stock' => 45,
    ],
    [
        'name' => 'Sun Hat',
        'description' => 'Wide-brimmed sun hat for UV protection',
        'price' => 18.99,
        'category' => 'Summer Collection',
        'is_active' => true,
        'stock' => 75,
    ],
    [
        'name' => 'Flip Flops',
        'description' => 'Lightweight and comfy summer flip flops',
        'price' => 14.99,
        'category' => 'Summer Collection',
        'is_active' => true,
        'stock' => 90,
    ],
];


        foreach ($products as $product) {
            $category = $categories->where('name', $product['category'])->first();

            if ($category) {
                Product::create([
                    'name' => $product['name'],
                    'slug' => Str::slug($product['name']),
                    'description' => $product['description'],
                    'price' => $product['price'],
                    'category_id' => $category->id,
                    'is_active' => $product['is_active'],
                    'stock' => $product['stock'],
                ]);
            }
        }
    }
}
