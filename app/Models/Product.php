<?php

namespace App\Models;

use App\Models\Language;
use Illuminate\Database\Eloquent\Model;
use Modules\Merchant\Entities\Merchant;

/**
 * @property mixed merchant_id
 * @property float price
 * @property int id
 * @property int quantity
 */
class Product extends Model
{
    protected $guarded = [];

    public function languages()
    {
        return $this->morphToMany(Language::class, 'languageable');
    }

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}
