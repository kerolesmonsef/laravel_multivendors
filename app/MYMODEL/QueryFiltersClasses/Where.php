<?php


namespace App\MYMODEL\QueryFiltersClasses;


use Cassandra\Cluster;
use Closure;
use Illuminate\Database\Eloquent\Builder;

class Where extends Filter
{

    private $operation;
    private $boolean;
    private $value_or_closure;

    /**
     * Where constructor.
     * @param string $column
     * @param boolean $ask_check
     * @param string $operation
     * @param string $boolean
     * @param Closure|string|int $value_or_closure
     */
    public function __construct(string $column, $ask_check, string $operation = '=', string $boolean = "AND", $value_or_closure = null)
    {
        parent::__construct($column, $ask_check);
        $this->operation = $operation;
        $this->boolean = $boolean;
        $this->value_or_closure = $value_or_closure;
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function applyFilter($builder)
    {
        $funk = $this->value_or_closure;
        if (is_callable($funk)) {
            $value = $funk();
        } else {
            $value = $funk;
        }


        return $builder->where($this->column, $this->operation, $value, $this->boolean);
    }
}
