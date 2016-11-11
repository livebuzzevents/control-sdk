<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\HasIdentifier;

/**
 * Class Channel
 *
 * @package Buzz\Control\Objects
 */
class Organization extends Base
{
    use HasIdentifier;

    /**
     * @var string
     */
    protected $name;

    /**
     * @return string
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
