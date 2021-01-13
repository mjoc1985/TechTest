<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $coffees = \App\Models\Coffee::where('qty', '>', 0)->get();


    return view('welcome', compact('coffees'));
});

Route::post('coffee/pour', \App\Http\Controllers\ProcessCoffeeController::class)->name('coffee.pour');
