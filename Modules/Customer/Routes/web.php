<?php
use Illuminate\Support\Facades\Route;
use Modules\Customer\Http\Controllers\CustomerPaymentRedirectsController;
use Modules\Customer\Http\Controllers\CustomerProductController;

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
Route::get('/', 'CustomerController@index')->name("customer.index");
Route::prefix('customer')->as('customer.')->group(function() {
    Route::get("product/{product}/buy/{payment_type}", [CustomerProductController::class, "buy"])->name("product.buy");
    Route::get("payment/{type}/success/product/{product}/{payment_type}", [CustomerPaymentRedirectsController::class, "success"])->name("payment.success");
    Route::get("payment/{type}/fail", [CustomerPaymentRedirectsController::class, "fail"])->name("payment.fail");
    Route::resource("product", "CustomerProductController");
});
