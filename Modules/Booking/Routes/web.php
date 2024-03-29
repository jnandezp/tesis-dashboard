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
use Modules\Booking\Http\Controllers\BookingController;

/*Route::prefix('booking')->group(function() {
    Route::get('/', 'BookingController@index');
});*/

Route::group(['prefix' => 'booking', 'as' => 'booking.','middleware'=>'is.admin'], function() {
    Route::get('/', [BookingController::class, 'index'])->name('index');
    Route::get('/calendar', [BookingController::class, 'calendar'])->name('calendar');
    Route::get('/create', [BookingController::class, 'create'])->name('create');
    /*Route::post('/store', [PostController::class, 'store'])->name('store');
    Route::get('/show/{post}', [PostController::class, 'show'])->name('show');
    Route::get('/edit/{post}', [PostController::class, 'edit'])->name('edit');
    Route::patch('/update/{post}', [PostController::class, 'update'])->name('update');
    Route::delete('/delete/{post}', [PostController::class, 'destroy'])->name('destroy');
    Route::patch('/restore/{post}', [PostController::class, 'restore'])->name('restore');

    Route::group(['prefix' => 'image', 'as' => 'image.','middleware'=>'is.admin'], function() {
        Route::post('/upload', [PostController::class, 'imageUpload'])->name('upload');
    });*/
});
