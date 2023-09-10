<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\DishController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// ROTTA INDEX


// ROTTA SHOW

Route::middleware('auth')->group(function () {
    Route::get('/', [GuestController::class, 'index'])->name('restaurants.showRestaurant');
    Route::get('/edit/{id}', [GuestController::class, 'edit'])->name('restaurants.editRestaurant');
    Route::put('/update/{id}', [GuestController::class, 'update'])->name('update');
    Route::get('/show/{id}', [GuestController::class, 'show'])->name('show');
});

Route::get('/dishes/create', [DishController::class,'create'])->name('dish.create');

Route::post('/dishes/store', [DishController::class,'store'])->name('dish.store');

Route :: get('/dishes/edit/{id}',[DishController::class,'edit'])
-> name('dish.edit');

Route :: put('/dishes/update/{id}',[DishController::class,'update'])
 -> name('dish.update');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
