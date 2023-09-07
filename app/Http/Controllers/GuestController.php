<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class GuestController extends Controller
{
    public function index() {
        $restaurants = Restaurant::all();
        return view("welcome", compact('restaurants'));
    }

}
