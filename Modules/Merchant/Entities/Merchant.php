<?php

namespace Modules\Merchant\Entities;

use App\Models\MainCategory;
use App\Models\MerchantPaymentType;
use App\Models\PaymentType;
use App\Models\User;
use App\Traits\ActiveColumnScope;
use Illuminate\Database\Eloquent\Model;
use Nwidart\Modules\Collection;

/**
 * @property User user
 * @property PaymentType []|Collection payment_types
 */
class Merchant extends Model
{
    protected $guarded = [];
    use ActiveColumnScope;

    public function user()
    {
        return $this->morphOne(User::class, 'profile');
    }

    public function category()
    {
        return $this->belongsTo(MainCategory::class, 'category_id');
    }

    public function payment_types()
    {
        return $this->belongsToMany(PaymentType::class,
            "merchant_payment_types",
            "merchant_id",
            'payment_type_id')
            ->withPivot("id", "payment_email", 'payment_key', 'payment_secret');
    }
}
