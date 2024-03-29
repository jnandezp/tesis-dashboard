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
use Modules\Dashboard\Http\Controllers\DashboardController;

Route::group(['prefix' => '/', 'as' => 'dashboard.'], function() {
    Route::get('/home', [DashboardController::class,'index'])->name('index');
});
