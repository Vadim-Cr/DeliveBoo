<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Restaurant;

class DishController extends Controller
{
    public function create() {
        return view('dish-create');
    }

    public function store(Request $request) {
        $user = Auth::user(); 
        $restaurant_id = $user->id;
        $restaurant = Restaurant::findOrFail($restaurant_id);
        
        if($request->image_path){
            $imagePath = Storage::put('uploads', $request->image_path);
        } else {
            $imagePath = null;
        }

        $availability = $request->has('availability') ? 1 : 0;
        $dish = new Dish();
        $dish->name = $request->input('name');
        $dish->description = $request->input('description');
        $dish->price = $request->input('price');
        $dish->image_path = $imagePath;
        $dish->availability = $availability;
        $dish->restaurant_id = $restaurant_id;

        $dish->save();

        return redirect()->route('show', ['id' => $restaurant_id]);
    }
}
