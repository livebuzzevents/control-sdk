<?php namespace Buzz\Control\Objects;

/**
 * Class Tag
 *
 * @package Buzz\Control\Objects
 */
class Tag extends Base
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
