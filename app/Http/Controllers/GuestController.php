<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Dish;
use App\Models\Typology;

class GuestController extends Controller
{
    public function index()
    {
        $restaurant = Restaurant::find(Auth::user()->restaurant_id);
        return view("restaurants.showRestaurant", compact('restaurant'));
    }

    public function show($id)
    {
        $dishes = Dish::all();
        $restaurant = Restaurant::findOrFail($id);
         
    
        // Verifica se il ristorante esiste
        if (!$restaurant) {
            return redirect('/')->with('error', 'Ristorante non trovato');
        }
    
        // Verifica se l'utente è loggato
        if (!Auth::check()) {
            return redirect('/')->with('error', 'Devi essere loggato per accedere a questa pagina');
            dd($restaurant);
        }
    
        // Verifica se l'utente loggato è il proprietario del ristorante
        if (Auth::user()->restaurant_id == $restaurant->id) {
            return view('show', ['restaurant' => $restaurant, 'dishes' => $dishes]);
        } else {
            return redirect('/')->with('error', 'Non autorizzato');
        }
       
    }

    public function edit($id)
    {
        $restaurant = Restaurant::find(Auth::user()->restaurant_id);
        $typologies = Typology :: all();

        return view('restaurants.editRestaurant', compact('restaurant', 'typologies'));
    }
    
    public function update(Request $request, $id) {

        $restaurant = Restaurant::find(Auth::user()->restaurant_id);
        $data = $request -> all();

        $restaurant -> update($data);
        $restaurant -> typologies() -> sync($data['typologies']);

        return redirect() -> route('show', $restaurant -> id);
    }
    
}



