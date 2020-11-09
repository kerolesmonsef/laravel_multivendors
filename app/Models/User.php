<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Admin\Entities\Admin;
use Modules\Merchant\Entities\Merchant;

/**
 * @property string profile_type
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->morphTo();
    }

    public function isAdmin()
    {
        return $this->profile_type == Admin::class;
    }

    public function isMerchant()
    {
        return $this->profile_type == Merchant::class;
    }

    public function isCustomer()
    {
        return $this->profile_type == Merchant::class;
    }
}
