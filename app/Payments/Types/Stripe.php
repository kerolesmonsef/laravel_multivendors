<?php


namespace App\Payments\Types;


use App\Payments\IPayment;

class Stripe extends IPayment
{

    public function getFormUrl()
    {
        // TODO: Implement getFormUrl() method.
    }

    public function success(array $parameters = [])
    {
        // TODO: Implement success() method.
    }

    public function fail()
    {
        // TODO: Implement fail() method.
    }
}
