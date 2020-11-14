<?php

namespace Modules\Merchant\Entities;

use App\Models\MainCategory;
use App\Models\User;
use App\Traits\ActiveColumnScope;
use Illuminate\Database\Eloquent\Model;

/**
 * @property User user
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
}
