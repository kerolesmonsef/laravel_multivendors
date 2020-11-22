<?php


namespace App\MYMODEL\QueryFiltersClasses;


abstract class Filter
{
    /** @var boolean */
    protected $ask_check;
    /** @var string */
    protected $column;

    public function __construct(string $column, $ask_check)
    {

        $this->ask_check = $ask_check;
        $this->column = $column;
    }

    public function handle($request, $next)
    {
        if (!$this->ask_check) {
            return $next($request);
        }

        $builder = $this->applyFilter($request);

        return $next($builder);
    }

    public abstract function applyFilter($builder);
}
