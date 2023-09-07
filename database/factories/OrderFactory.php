<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Restaurant;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date_time'=> fake() -> dateTime(),
            'total_amount'=> fake() -> randomFloat(2, 1, 10000),
            'order_status'=> fake() -> boolean(),
            
            'restaurant_id' => function() {
                return Restaurant::inRandomOrder()->first()->id;
            }
        ];
    }
}
