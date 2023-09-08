<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Restaurant;
use App\Models\Typology;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $typologies = Typology :: all();
        return view('auth.register', compact('typologies'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        dd($data);

        $restaurant = Restaurant::create([
            'activity_name' => $request->activity_name,
            'image_path' => 'required|file|image|max:2048',
            'address' => $request->address,
            'vat' => $request->vat,
            'mobile_phone' => $request->mobile_phone
        ]);

        if ($request->has('typologies')) {
            $restaurant->typologies()->attach($request->typologies);
        }

        $restaurantId = $restaurant->id;
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'restaurant_id' => $restaurantId
        ]);
        
        // ...
        
        
        event(new Registered($user));
        
        Auth::login($user);
        
        return redirect(RouteServiceProvider::HOME);
    }
}
