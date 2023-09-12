<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Typology;

class RestaurantController extends Controller
{
    public function testApi() {

        return response() -> json([
            'message' => 'Hello, world'
        ]);
    }

    public function typologiesIndex() {   
        $restaurantWithTypologies = Restaurant::with('typologies')->get();
        return response()->json($restaurantWithTypologies);
    }

    public function getRestaurantDetail($id) {
        $restaurant = Restaurant::with('dishes')->find($id);
        return response()->json($restaurant);
    }
}
