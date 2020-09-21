<?php

namespace Database\Factories;

use App\Models\{User, Order};
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::find(2)->id,
            'cost' => $this->faker->randomFloat(2, 10, 100),
            'status' => $this->faker->numberBetween(1, 4),
            'currency' => 'usd'
        ];
    }
}
