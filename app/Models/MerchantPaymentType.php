<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Merchant\Entities\Merchant;

/**
 * @property mixed merchant_id
 * @property PaymentType type
 */
class MerchantPaymentType extends Model
{
    protected $guarded = [];
    public function type()
    {
        return $this->belongsTo(PaymentType::class, 'payment_type_id');
    }

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}
