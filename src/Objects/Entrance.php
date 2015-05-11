<?php namespace Buzz\Control\Objects;

/**
 * Class Entrance
 *
 * @package Buzz\Control\Objects
 */
class Entrance extends Object
{
    /**
     * @var
     */
    protected $identifier;

    /**
     * @return mixed
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @param mixed $identifier
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
    }
}