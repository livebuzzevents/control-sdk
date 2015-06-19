<?php namespace Buzz\Control\Objects\Entrance;

use Buzz\Control\Objects\Object;
use Buzz\Control\Objects\Traits\BelongsToEntrance;

/**
 * Class Scanner
 *
 * @package Buzz\Control\Objects\Entrance
 */
class Scanner extends Object
{
    use BelongsToEntrance;

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