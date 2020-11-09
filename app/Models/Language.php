<?php

namespace App\Models;

use App\Traits\ActiveColumnScope;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use ActiveColumnScope;
    protected $guarded = [];

    public $timestamps = false;
}
