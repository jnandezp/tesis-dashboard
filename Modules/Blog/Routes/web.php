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
use Modules\Blog\Http\Controllers\BlogController;
use Modules\Blog\Http\Controllers\PostController;
use Modules\Blog\Http\Controllers\CategoryController;
use Modules\Blog\Http\Controllers\TagController;

Route::group(['prefix' => '', 'as' => 'blog.'], function() {
    Route::get('/',  [BlogController::class, 'index'])->name('index');
});

/*Route::group(['prefix' => '', 'as' => 'blog.','middleware'=>'is.admin'], function() {
    Route::get('/',  [BlogController::class, 'index'])->name('index');
});*/


Route::group(['prefix' => 'posts', 'as' => 'posts.','middleware'=>'is.admin'], function() {
    Route::get('/',  [PostController::class, 'index'])->name('index');
    Route::get('/create', [PostController::class, 'create'])->name('create');
    Route::post('/store', [PostController::class, 'store'])->name('store');
    Route::get('/show/{post}', [PostController::class, 'show'])->name('show');
    Route::get('/edit/{post}', [PostController::class, 'edit'])->name('edit');
    Route::patch('/update/{post}', [PostController::class, 'update'])->name('update');
    Route::delete('/delete/{post}', [PostController::class, 'destroy'])->name('destroy');
    Route::patch('/restore/{post}', [PostController::class, 'restore'])->name('restore');

    Route::group(['prefix' => 'image', 'as' => 'image.','middleware'=>'is.admin'], function() {
        Route::post('/upload', [PostController::class, 'imageUpload'])->name('upload');
    });
});

Route::group(['prefix' => 'categories', 'as' => 'categories.','middleware'=>'is.admin'], function() {
    Route::get('/',  [CategoryController::class, 'index'])->name('index');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::get('/show/{category}', [CategoryController::class, 'show'])->name('show');
    Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('edit');
});

Route::group(['prefix' => 'tags', 'as' => 'tags.','middleware'=>'is.admin'], function() {
    Route::get('/',  [TagController::class, 'index'])->name('index');
    Route::get('/create', [TagController::class, 'create'])->name('create');
    Route::get('/show/{tag}', [TagController::class, 'show'])->name('show');
    Route::get('/edit/{tag}', [TagController::class, 'edit'])->name('edit');
});

