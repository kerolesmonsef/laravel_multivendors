<?php

namespace App\Models;

use App\Traits\ActiveColumnScope;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed photo
 * @property mixed languages
 */
class MainCategory extends Model
{
    protected $guarded = [];
    use ActiveColumnScope;

    public function languages()
    {
        return $this->morphToMany(Language::class, 'languageable')
            ->withPivot('content');
    }


}
