<?php namespace Buzz\Control\Objects\Traits;

/**
 * Class HasDestination
 *
 * @package Buzz\Control\Objects\Traits
 */
trait HasDestination
{
    /**
     * @var string
     */
    protected $destination;

    /**
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param string $destination
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
    }
}