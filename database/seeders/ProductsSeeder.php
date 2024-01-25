<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public const PRODUCTS = [
        [
           'name' => 'IPAD transitions',
           'description' => 'DaVinci Resolve: 17.2 or higher, Resolution: Responsive, FPS: Any, Items: 185 transitions, License: Lifetime',
           'image' => '/storage/uploads/images/product.png',
           'price' => 59,
           'category' => 'transitions',
        ],
        [
           'name' => 'Glitch transitions',
           'description' => 'DaVinci Resolve: 17.2 or higher, Resolution: Responsive, FPS: Any, Items: 132 transitions, License: Lifetime',
           'image' => '/storage/uploads/images/product.png',
           'price' => 30,
           'category' => 'transitions',
        ],
        [
           'name' => 'Simple transitions',
           'description' => 'DaVinci Resolve: 17.2 or higher, Resolution: Responsive, FPS: Any, Items: 56 transitions, License: Lifetime',
           'image' => '/storage/uploads/images/product.png',
           'price' => 20,
           'category' => 'transitions',
        ],
        [
           'name' => 'Luts Duotone',
           'description' => 'DaVinci Resolve: 17.2 or higher, Resolution: Responsive, FPS: Any, Items: 25 lut files, License: Lifetime',
           'image' => '/storage/uploads/images/product.png',
           'price' => 30,
           'category' => 'transitions',
        ],
        [
           'name' => 'Luts Hollywood',
           'description' => 'DaVinci Resolve: 17.2 or higher, Resolution: Responsive, FPS: Any, Items: 75 lut files, License: Lifetime',
           'image' => '/storage/uploads/images/product.png',
           'price' => 30,
           'category' => 'transitions',
        ],
        [
           'name' => 'Luts Cinematic',
           'description' => 'DaVinci Resolve: 17.2 or higher, Resolution: Responsive, FPS: Any, Items: 142 lut files, License: Lifetime',
           'image' => '/storage/uploads/images/product.png',
           'price' => 30,
           'category' => 'transitions',
        ],
        [
           'name' => 'Flip Transitions',
           'description' => 'DaVinci Resolve: 17.2 or higher, Resolution: Responsive, FPS: Any, Items: 9 transitions, License: Lifetime',
           'image' => '/storage/uploads/images/product.png',
           'price' => 15,
           'category' => 'transitions',
        ],
        [
           'name' => 'Light Leaks Pack',
           'description' => 'DaVinci Resolve: 17.2 or higher, Resolution: Responsive, FPS: Any, Items: 476 .mp4 files, License: Lifetime',
           'image' => '/storage/uploads/images/product.png',
           'price' => 59,
           'category' => 'transitions',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::PRODUCTS as $product) {
            Product::create($product);
        }
    }
}
