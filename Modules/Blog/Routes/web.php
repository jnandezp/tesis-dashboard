<?php

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
use App\Http\Controllers\HomeController;

Route::prefix('blog')->group(function() {
    Route::get('/', 'BlogController@index');
});



// Route::get('/home', [HomeController::class, 'index'])->name('home');
