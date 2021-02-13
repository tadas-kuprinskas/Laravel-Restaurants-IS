<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes(['register' => false]);

Route::get('changelanguage/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'lt'])) abort(400);
    session(['locale' => $locale]);
    app()->setLocale($locale);
    return redirect()->back();
});



Route::middleware(['auth'])->group(function(){

Route::get('/', [App\Http\Controllers\MenuController::class, 'index']);
Route::resource('menu', App\Http\Controllers\MenuController::class);
Route::resource('restaurant', App\Http\Controllers\RestaurantController::class);
Route::get('restaurant/{id}/details', [App\Http\Controllers\RestaurantController::class, 'details'])->name('restaurant.details');

});

