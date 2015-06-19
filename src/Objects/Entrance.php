<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToCampaign;

/**
 * Class Entrance
 *
 * @package Buzz\Control\Objects
 */
class Entrance extends Object
{
    use BelongsToCampaign;

    /**
     * @var string
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