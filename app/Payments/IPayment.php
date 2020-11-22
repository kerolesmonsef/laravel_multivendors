<?php


namespace App\Payments;


use App\Models\MerchantPaymentType;
use App\Models\Product;
use Modules\Merchant\Entities\Merchant;

abstract class IPayment
{
    protected $product;

    protected $paymentType;

    public function __construct(Product $product , MerchantPaymentType $paymentType)
    {
        $this->product = $product;
        $this->paymentType = $paymentType;

    }

    public abstract function getFormUrl();
    public abstract function success(array $parameters = []);
    public abstract function fail();
}
