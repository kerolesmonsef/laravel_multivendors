<?php

namespace Modules\Merchant\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $guarded = [];

    public function user()
    {
        $this->morphOne(User::class, 'profile');
    }
}
