<?php

namespace App\Models;

use App\Models\Language;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function languages()
    {
        return $this->morphToMany(Language::class, 'languageable');
    }
}
