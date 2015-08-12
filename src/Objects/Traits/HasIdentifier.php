<?php namespace Buzz\Control\Objects\Traits;

/**
 * Class HasIdentifier
 *
 * @package Buzz\Control\Objects\Traits
 */
trait HasIdentifier
{
    /**
     * @var string
     */
    protected $identifier;

    /**
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @param string $identifier
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
    }
}