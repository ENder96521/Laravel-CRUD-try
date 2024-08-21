<?php

use App\Http\Controllers\DrinkController;
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


Route::get('/', [DrinkController::class, 'index']);

Route::post('/create-drink', [DrinkController::class, 'create']);

Route::get('/delete', function() {
    return view('delete');
});

Route::delete('/delete-drink', [DrinkController::class, 'delete']);

Route::get('/list', [DrinkController::class, 'show']);

Route::get('/change', [DrinkController::class, 'change']);

Route::put('/update-drink', [DrinkController::class, 'updateDrink']);
