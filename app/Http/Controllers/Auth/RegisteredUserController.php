<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Storage;
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
    $data = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'activity_name' => ['required', 'string', 'max:255'],
        'address' => ['required', 'string', 'max:255'],
        'vat' => ['required', 'string', 'max:255'],
        'mobile_phone' => ['required', 'string', 'max:255'],
        'image_path' => ['image', 'max:2048'] 
    ]);

    if($request->image_path){
        $imagePath = Storage::put('uploads', $request->image_path);
    } else {
        $imagePath = null;
    }
    $restaurant = Restaurant::create([
        'activity_name' => $data['activity_name'],
        'address' => $data['address'],
        'vat' => $data['vat'],
        'mobile_phone' => $data['mobile_phone'],
        'image_path' => $imagePath
    ]);

    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'restaurant_id' => $restaurant->id
    ]);

    event(new Registered($user));
    Auth::login($user);

    return redirect(RouteServiceProvider::HOME);
}

}
