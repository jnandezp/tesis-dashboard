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

use Modules\Company\Http\Controllers\CompanyController;

Route::group(['prefix' => 'companies', 'as' => 'companies.','middleware'=>'is.admin'], function() {
    Route::get('/',  [CompanyController::class, 'index'])->name('index');
    Route::get('/create', [CompanyController::class, 'create'])->name('create');
    Route::post('/store', [CompanyController::class, 'store'])->name('store');
    Route::get('/show/{post}', [CompanyController::class, 'show'])->name('show');
    Route::get('/edit/{post}', [CompanyController::class, 'edit'])->name('edit');
    Route::patch('/update/{post}', [CompanyController::class, 'update'])->name('update');
    Route::delete('/delete/{post}', [CompanyController::class, 'destroy'])->name('destroy');
    Route::patch('/restore/{post}', [CompanyController::class, 'restore'])->name('restore');

    Route::group(['prefix' => 'image', 'as' => 'image.','middleware'=>'is.admin'], function() {
        Route::post('/upload', [CompanyController::class, 'imageUpload'])->name('upload');
    });


});
