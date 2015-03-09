<?php namespace Buzz\Control\Objects;

/**
 * Class Parameter
 *
 * @package Buzz\Control\Objects
 */
class Parameter extends Object
{
    /**
     * @var
     */
    protected $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}