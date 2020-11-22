<?php


namespace App\MYMODEL\QueryFiltersClasses;


use Carbon\Carbon;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class WhereDateBetween extends Filter
{

    protected $boolean, $time_zone, $from_date, $to_date;

    /**
     * WhereDate constructor.
     * @param string $column
     * @param string $ask_check
     * @param string|Carbon $from_date
     * @param string|Carbon $to_date
     * @param string $time_zone
     * @param string $boolean
     */
    public function __construct(string $column, $ask_check, $from_date, $to_date, string $time_zone = "Africa/Cairo", string $boolean = "AND")
    {
        parent::__construct($column, $ask_check);
        $this->boolean = $boolean;
        $this->time_zone = $time_zone;
        $this->from_date = $from_date;
        $this->to_date = $to_date;
    }

    /**
     * @param Builder $builder
     * @return Builder
     * @throws \Exception
     */
    public function applyFilter($builder)
    {
        $time_zone = new Carbon($this->time_zone);
        $OffsetName = $time_zone->timezone->toOffsetName();
        return $builder->whereBetween(DB::raw("DATE_FORMAT( CONVERT_TZ ($this->column, '+00:00','$OffsetName'),'%Y-%m-%d' )"), [$this->from_date, $this->to_date], $this->boolean);
    }
}
