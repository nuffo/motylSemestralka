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

Route::view('/', "home")->name("homepage");
Route::view('/contact', "contact")->name("contactpage");
Route::resource("/menu", \App\Http\Controllers\MealController::class)->except(['create', 'show', 'edit'])->parameters(['menu' => 'meal']);
Route::resource('/order', \App\Http\Controllers\OrderController::class);
Route::resource('/order-history', \App\Http\Controllers\OrderHistoryController::class);

require __DIR__.'/auth.php';