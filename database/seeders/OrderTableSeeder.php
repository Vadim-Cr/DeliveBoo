<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Dish;
use App\Models\Restaurant;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = Order :: factory() -> count(30) -> create();
    
        foreach ($orders as $order) {   // Loop through the array of Typology objects

            // todo collegamento con dishes
            $dishes = Dish :: inRandomOrder() -> limit(rand(2, 4)) -> get();

            $order -> dishes() -> attach($dishes);

            // todo collegamento con restaurants
            $restaurant = Restaurant :: inRandomOrder() -> first();
            $order -> restaurant_id = $restaurant -> id;

            // !SAVE
            $order->save();
        }
    }
    
}
