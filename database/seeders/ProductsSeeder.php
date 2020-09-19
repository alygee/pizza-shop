<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
           'name' => 'Cheese',
           'description' => 'Mozzarella, marinara sauce, fresh basil',
           'image' => '/storage/uploads/images/cheese_1600496905.jpg',
           'price' => 7.99
        ]);

        Product::create([
           'name' => 'Pepperoni',
           'description' => 'Double pepperoni, mozzarella, marinara sauce, fresh basil',
           'image' => '/storage/uploads/images/peperoni_1600497109.jpg',
           'price' => 8.99
        ]);

        Product::create([
           'name' => 'Buffalo Chicken',
           'description' => 'Grilled chicken, buffalo sauce, mozzarella, cheddar, red onions',
           'image' => '/storage/uploads/images/buffalo-chicken_1600497175.jpg',
           'price' => 10.99
        ]);

        Product::create([
           'name' => 'Chicken BBQ',
           'description' => 'Grilled chicken, bbq sauce, bacon, mozzarella, fresh basil, red onions',
           'image' => '/storage/uploads/images/chicken-bbq_1600497224.jpg',
           'price' => 11.49
        ]);

        Product::create([
           'name' => 'Supreme',
           'description' => 'Pepperoni, fresh basil, mozzarella, italian sausage, bacon, mushrooms, red onions, black olives, green peppers, marinara sauce',
           'image' => '/storage/uploads/images/supreme_1600497249.jpg',
           'price' => 11.99
        ]);

        Product::create([
           'name' => 'The Meats',
           'description' => 'Pepperoni, ham, italian sausage, mozzarella, bacon, marinara sauce, fresh basil',
           'image' => '/storage/uploads/images/the-meats_1600497275.jpg',
           'price' => 11.99
        ]);

        Product::create([
           'name' => 'Spinach Feta',
           'description' => 'Fresh spinach, feta, ricotta, mozzarella, fresh parsley, red onions',
           'image' => '/storage/uploads/images/spinach-feta_1600497304.jpg',
           'price' => 9.99
        ]);

        Product::create([
           'name' => 'Chicken Club',
           'description' => 'Grilled chicken, cherry tomatoes, ricotta, fresh parsley, mozzarella, bacon, red onions',
           'image' => '/storage/uploads/images/chicken-club_1600497337.jpg',
           'price' => 9.99
        ]);
    }
}
