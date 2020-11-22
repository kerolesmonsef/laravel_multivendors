<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminLanguageController;
use Modules\Admin\Http\Controllers\AdminLoginController;
use Modules\Admin\Http\Controllers\MerchantPaymentController;

Route::get('/login', [AdminLoginController::class, 'getLogin'])->name("login")->middleware("guest");
Route::post('/login', [AdminLoginController::class, 'postLogin'])->name("post.login");


Route::middleware('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::resource('language', "AdminLanguageController")->except('show');
    Route::resource('main_category', "MainCategoryController")->except("show");
    Route::resource('merchant', "MerchantController")->except("show");
    Route::middleware('auth')->as("merchant_payment_type.")->group(function (){
        Route::get("/merchant_payment_type/create/{merchant}",[MerchantPaymentController::class,'create'])->name("create");
        Route::post("/merchant_payment_type/{merchant}",[MerchantPaymentController::class,'store'])->name("store");
        Route::get("/merchant_payment_type/{merchant_payment}/edit",[MerchantPaymentController::class,'edit'])->name("edit");
        Route::put("/merchant_payment_type/{merchant_payment}/update",[MerchantPaymentController::class,'update'])->name("update");
        Route::delete("/merchant_payment_type/{merchant_payment}/destroy",[MerchantPaymentController::class,'destroy'])->name("destroy");
    });

});

