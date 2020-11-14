<?php

namespace Modules\Merchant\Entities;

use App\Models\User;
use App\Traits\ActiveColumnScope;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $guarded = [];
    use ActiveColumnScope;

    public function user()
    {
        $this->morphOne(User::class, 'profile');
    }
}
