<?php

namespace Database\Seeders;

use App\Models\{Product, Order};
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::factory()
            ->times(5)
            ->create();
    }
}
