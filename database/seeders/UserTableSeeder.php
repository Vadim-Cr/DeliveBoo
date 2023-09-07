<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User :: factory() -> count(15) -> make();

        $restaurants = Restaurant::all()->pluck('id'); //->shuffle()

        foreach ($users as $index => $user) {
            if (isset($restaurants[$index])) {
                $user->restaurant_id = $restaurants[$index];
                $user->save();
            }
        }
    }
}
