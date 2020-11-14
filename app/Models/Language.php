<?php

namespace App\Models;

use App\Product;
use App\Traits\ActiveColumnScope;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use ActiveColumnScope;
    protected $guarded = [];
    public $timestamps = false;

    public function main_categories()
    {
        return $this->morphedByMany(MainCategory::class, 'languageable')->withPivot('content');
    }

    public function products()
    {
        return $this->morphedByMany(Product::class, 'languageable');
    }
}
