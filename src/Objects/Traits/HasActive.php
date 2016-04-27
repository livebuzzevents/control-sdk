<?php namespace Buzz\Control\Objects\Traits;

/**
 * Class HasActive
 *
 * @package Buzz\Control\Objects\Traits
 */
trait HasActive
{
    /**
     * @var string
     */
    protected $active;

    /**
     * @return string
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param string $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }
}