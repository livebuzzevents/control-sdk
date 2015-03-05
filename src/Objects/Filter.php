<?php namespace Buzz\Control\Objects;

use Buzz\Control\Exceptions\ErrorException;

class Filter
{
    protected $filters   = [];
    protected $operators = ['=', '<', '>', '<=', '>=', '<>', '!=', 'like', 'not like', 'between', 'in', 'not in'];

    public function add($parameter, $operator, $value)
    {
        if (!in_array($operator, $this->operators)) {
            throw new ErrorException('Invalid operator');
        }

        if ($operator === 'in' || $operator === 'not in') {
            if (!is_array($value)) {
                throw new ErrorException("Only array values accepted for '{$operator}' operator");
            }
        } else {
            if (!is_scalar($value)) {
                throw new ErrorException("Only scalar values accepted for '{$operator}' operator");
            }
        }

        array_push(
            $this->filters,
            compact('parameter', 'operator', 'value')
        );
    }

    public function getFilters()
    {
        return $this->filters;
    }
}