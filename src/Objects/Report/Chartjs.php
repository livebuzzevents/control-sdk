<?php namespace Buzz\Control\Objects\Report;

use Buzz\Control\Objects\Object;

/**
 * Class Chartjs
 *
 * @package Buzz\Control\Objects
 */
class Chartjs extends Object
{
    /**
     * @var array
     */
    protected $series;

    /**
     * @return mixed
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * @param array $series
     */
    public function setSeries(array $series)
    {
        $this->series = $series;
    }
}