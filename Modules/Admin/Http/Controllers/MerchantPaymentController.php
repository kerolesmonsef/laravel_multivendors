<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\MerchantPaymentType;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\AdminMerchantPaymentTypeRequest;
use Modules\Merchant\Entities\Merchant;

class MerchantPaymentController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     * @param Merchant $merchant
     * @return Renderable
     */
    public function index(Merchant $merchant)
    {
//        $payment_types = $merchant->payment_types;
//
//        return view('admin::Merchant.PaymentType.merchant_payment_types', [
//            'payment_types' => $payment_types
//        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Merchant $merchant)
    {
        return view('admin::Merchant.PaymentType.add_edit_merchant_payment_types', [
            'merchant_payment' => new MerchantPaymentType,
            'merchant' => $merchant,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param AdminMerchantPaymentTypeRequest $request
     * @param Merchant $merchant
     * @return void
     */
    public function store(AdminMerchantPaymentTypeRequest $request, Merchant $merchant)
    {
        try {
            $create = request()->except("_token", "_method");
            $create['merchant_id'] = $merchant->id;
            MerchantPaymentType::create($create);
            return redirect()->route('admin.merchant.edit', $merchant->id)->with("s_alert_success", "Payment Added Successfully");
        } catch (\Exception $e) {
            return redirect()->back()->with("s_alert_error", $e->getMessage());
        }
    }


    /**
     * Show the form for editing the specified resource.
     * @param MerchantPaymentType $merchant_payment
     * @return Renderable
     */
    public function edit(MerchantPaymentType $merchant_payment)
    {
        return view('admin::Merchant.PaymentType.add_edit_merchant_payment_types', [
            'merchant_payment' => $merchant_payment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param AdminMerchantPaymentTypeRequest $request
     * @param MerchantPaymentType $merchant_payment
     * @return void
     */
    public function update(AdminMerchantPaymentTypeRequest $request, MerchantPaymentType $merchant_payment)
    {
        try {
            $merchant_payment->update(request()->except("_token", "_method"));
            return redirect()->route('admin.merchant.edit', $merchant_payment->merchant->id)->with("s_alert_success", "Payment Added Successfully");
        } catch (\Exception $e) {
            return redirect()->back()->with("s_alert_error", $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param MerchantPaymentType $merchant_payment
     * @return void
     * @throws \Exception
     */
    public function destroy(MerchantPaymentType $merchant_payment)
    {
        $merchant_payment->delete();
        return redirect()->back()->with("s_alert_success", "Payment Deleted Successfully");
    }
}
