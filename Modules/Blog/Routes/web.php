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
use Modules\Blog\Http\Controllers\PostController;

/*Route::prefix('blog')->group(function() {
    Route::get('/', 'BlogController@index');
});*/


Route::group(['prefix' => 'posts', 'as' => 'posts.','middleware'=>'is.admin'], function() {
    Route::get('/', 'PostController@index')->name('index');
    Route::get('/create', [PostController::class, 'create'])->name('create');
    Route::post('/store', [PostController::class, 'store'])->name('store');
    Route::get('/show/{post}', [PostController::class, 'show'])->name('show');
    Route::get('/edit/{post}', [PostController::class, 'edit'])->name('edit');
    Route::patch('/update/{post}', [PostController::class, 'update'])->name('update');
});


// Route::get('/home', [HomeController::class, 'index'])->name('home');
