<?php namespace Buzz\Control\Objects\Report;

use Buzz\Control\Objects\Base;

/**
 * Class Chartjs
 *
 * @package Buzz\Control\Objects
 */
class Chartjs extends Base
{
    /**
     * @var array
     */
    protected $series;

    /**
     * @var string
     */
    protected $type;

    /**
     * @return mixed
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}
