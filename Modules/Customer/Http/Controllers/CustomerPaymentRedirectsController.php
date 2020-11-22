<?php

namespace Modules\Customer\Http\Controllers;

use App\Models\MerchantPaymentType;
use App\Models\Product;
use App\Payments\Types\Paypal;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CustomerPaymentRedirectsController extends Controller
{
    public function success(string $type, Product $product, MerchantPaymentType $payment_type)
    {
        if ($payment_type->merchant_id != $product->merchant_id) {
            return abort(404);
        }
        if ($type == "paypal") {
            if (!request('PayerID') || !request('paymentId') || !request('token')) {
                dd("Payment Error");
            }
            $paypal = new Paypal($product, $payment_type);
            return $paypal->success();
        }
    }

    public function fail(string $type)
    {

    }
}
