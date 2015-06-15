<?php namespace Buzz\Control\Objects;

use Buzz\Control\Exceptions\ErrorException;
use DateTime;

class Filter
{
    protected $filters = [];

    protected $operators = [
        '=',
        '<',
        '>',
        '<=',
        '>=',
        '<>',
        '!=',
        'like',
        'not like',
        'between',
        'in',
        'not in',
        'has'
    ];

    public function set(array $filters)
    {
        if (empty($filters)) {
            return $this;
        }

        foreach ($filters as $filter) {
            $this->add(...array_values($filter));
        }

        return $this;
    }

    public function add($parameter, $operator, $value)
    {
        $this->validate($operator, $value);

        array_push(
            $this->filters,
            compact('parameter', 'operator', 'value')
        );

        return $this;
    }

    private function validate($operator, $value)
    {
        if (!in_array($operator, $this->operators)) {
            throw new ErrorException('Invalid operator');
        }

        if (in_array($operator, ['in', 'not in', 'between'])) {
            if (!is_array($value)) {
                throw new ErrorException("Only array values accepted for '{$operator}' operator");
            }
        } elseif ($operator === 'has') {
            //nothing to validate
        } else {
            if (!is_scalar($value) && !($value instanceof DateTime)) {
                throw new ErrorException("Only scalar values accepted for '{$operator}' operator");
            }
        }
    }

    public function getFilters()
    {
        return $this->filters;
    }
}