<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Dish;

class GuestController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return view("welcome", compact('restaurants'));
    }

    public function show($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $dishes = Dish::all();

        return view("show", compact('restaurant', 'dishes'));
    }
}
