<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use App\Models\Typology;


class RestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = Restaurant :: factory() -> count(15) -> make();

        foreach ($restaurants as $restaurant) {    
               
            $restaurant->save();
            $typologies = Typology :: inRandomOrder() -> limit(rand(0, 4)) -> get();

            $restaurant -> typologies() -> attach($typologies);
        }
    }

}
