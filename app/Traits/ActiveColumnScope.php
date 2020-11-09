<?php


namespace App\Traits;


use Illuminate\Database\Query\Builder;

trait ActiveColumnScope
{
    /**
     * @param Builder $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where("active", "=", "yes");
    }
}
