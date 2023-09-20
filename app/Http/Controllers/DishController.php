<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Restaurant;

class DishController extends Controller
{
    public function create()
    {
        return view('dish-create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $restaurant_id = $user->id;
        $restaurant = Restaurant::findOrFail($restaurant_id);

        if ($request->image_path) {
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
        $dish->availability = $request->input('availability') == 1 ? true : false;
        $dish->restaurant_id = $restaurant_id;
        // Converti il prezzo in un formato compatibile con MySQL
        if (isset($dish['price'])) {
            $dish['price'] = str_replace(',', '.', $dish['price']);
        }

        $dish->save();

        return redirect()->route('show', ['id' => $restaurant_id]);
    }

    public function edit($id)
    {
        $dish = Dish::findOrFail($id);

        return view('dish-edit', compact('dish'));
    }

    public function destroy($id)
    {
        $dish = Dish::findOrFail($id);
        $dish->delete();  // Questo eseguirà una "soft delete" se hai configurato il modello correttamente

        return redirect()->route('show', ['id' => $dish->restaurant_id]);;
    }
    public function update(Request $request, $id)
    {

        $data = $request->all();
        $user = Auth::user();
        $restaurant_id = $user->id;
        $restaurant = Restaurant::findOrFail($restaurant_id);
        $dish = Dish::findOrFail($id);

        if ($request->hasFile('image_path')) {
            $imagePath = Storage::put('uploads', $request->file('image_path'));
            $data['image_path'] = $imagePath;
        }

        // Converti il prezzo in un formato compatibile con MySQL
        if (isset($data['price'])) {
            $data['price'] = str_replace(',', '.', $data['price']);
        }
        $dish->update($data);

        return redirect()->route('show', ['id' => $restaurant_id]);
    }
}
