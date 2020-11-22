<?php


namespace App\MYMODEL\QueryFiltersClasses;


use Carbon\Carbon;
use Illuminate\Database\Query\Builder;

class WhereDate extends Filter
{

    protected $value, $boolean, $time_zone;

    /**
     * WhereDate constructor.
     * @param string $column
     * @param boolean $ask_check
     * @param string $time_zone
     * @param string|null $value
     * @param string $boolean
     */
    public function __construct(string $column, $ask_check, string $time_zone = "Africa/Cairo", string $boolean = "AND", string $value = null)
    {
        parent::__construct($column, $ask_check);
        $this->value = $value;
        $this->boolean = $boolean;
        $this->time_zone = $time_zone;
    }

    /**
     * @param Builder $builder
     * @return Builder
     * @throws \Exception
     */
    public function applyFilter($builder)
    {
        $value = $this->value ?: request($this->ask_check);
        $time_zone = new Carbon($this->time_zone);
        $OffsetName = $time_zone->timezone->toOffsetName();
        return $builder->whereRaw(" DATE_FORMAT( CONVERT_TZ ($this->column, '+00:00','$OffsetName'),'%Y-%m-%d' ) = '$value' ", [], $this->boolean);
    }
}
