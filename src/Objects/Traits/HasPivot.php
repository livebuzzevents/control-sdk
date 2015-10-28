<?php namespace Buzz\Control\Objects\Traits;

/**
 * Class HasPivot
 *
 * @package Buzz\Control\Objects\Traits
 */
trait HasPivot
{
    /**
     * @var []
     */
    protected $pivot;

    /**
     * @return []
     */
    public function getPivot()
    {
        return $this->pivot;
    }

    /**
     * @param [] $pivot
     */
    public function setPivot($pivot)
    {
        $this->pivot = $pivot;
    }
}