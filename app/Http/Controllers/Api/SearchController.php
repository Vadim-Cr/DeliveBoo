<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Typology;

class SearchController extends Controller
{

    public function testApi() {

        return response() -> json([
            'message' => 'Hello, world'
        ]);
    }
   
    public function searchByTypology(Request $request)
    {
        $typologyNames = $request->input('typology_names');  // Supponiamo che typology_names sia un array di nomi di tipologie
    
        if ($typologyNames) {
            $query = Restaurant::query();
            
            foreach ($typologyNames as $typologyName) {
                $query->whereHas('typologies', function ($q) use ($typologyName) {
                    $q->where('name', $typologyName);
                });
            }
    
            $restaurants = $query->with('typologies')->get();
        } else {
            $restaurants = Restaurant::with('typologies')->get();
        }
    
        return response()->json($restaurants);
    }
}