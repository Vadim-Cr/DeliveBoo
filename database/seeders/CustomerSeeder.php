<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Order;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $customers = Customer :: factory() -> count(30) -> make();

        $orders = Order::all()->pluck('id'); //->shuffle()

        foreach ($customers as $index => $customer) {
            if (isset($orders[$index])) {
                $customer->order_id = $orders[$index];
                $customer->save();
            }
        }
           
    }
}
