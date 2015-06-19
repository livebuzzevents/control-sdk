<?php namespace Buzz\Control\Objects;

/**
 * Class Parameter
 *
 * @package Buzz\Control\Objects
 */
class Parameter extends Object
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}