<?php

namespace Modules\Customer\Http\Controllers;

use App\Models\MerchantPaymentType;
use App\Models\Product;
use App\Payments\IPayment;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CustomerProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('customer::index');
    }


    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Product $product)
    {
//        dd($product);
        return view('customer::Product.product', [
            'product' => $product,
        ]);
    }

    /**
     * customer buy the specific Product
     *
     * @param Product $product
     * @param MerchantPaymentType $payment_type
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function buy(Product $product, MerchantPaymentType $payment_type)
    {
        if ($product->merchant_id != $payment_type->merchant_id) return abort("404");
        $payment_class = $payment_type->type->class_path;
        /** @var IPayment $payment_object */
        $payment_object = new $payment_class($product,$payment_type);
        return redirect()->to($payment_object->getFormUrl());

    }


}
