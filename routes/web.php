<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GuestController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
