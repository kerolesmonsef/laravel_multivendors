<?php


namespace App\MYMODEL\QueryFiltersClasses;


use Illuminate\Database\Query\Builder;

class WhereLike extends Filter
{

    private $value;
    private $boolean;

    /**
     * WhereLike constructor.
     * @param string $column
     * @param boolean $ask_check
     * @param string $value
     * @param string $boolean
     */
    public function __construct(string $column, $ask_check, string $boolean = "AND", string $value = null)
    {
        parent::__construct($column, $ask_check);
        $this->value = $value;
        $this->boolean = $boolean;
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function applyFilter($builder)
    {
        $like = $this->value;
        return $builder->where($this->column, 'LIKE', "%$like%", $this->boolean);
    }
}
