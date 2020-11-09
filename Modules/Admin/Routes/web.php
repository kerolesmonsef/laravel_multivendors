<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminLanguageController;
use Modules\Admin\Http\Controllers\AdminLoginController;

Route::get('/login', [AdminLoginController::class, 'getLogin'])->name("login")->middleware("guest");
Route::post('/login', [AdminLoginController::class, 'postLogin'])->name("post.login");


Route::middleware('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::resource('language', "AdminLanguageController")->except('show');
});

