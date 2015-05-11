<?php namespace Buzz\Control\Objects\Entrance;

use Buzz\Control\Objects\Object;

/**
 * Class Scanner
 *
 * @package Buzz\Control\Objects\Entrance
 */
class Scanner extends Object
{
    /**
     * @var
     */
    protected $identifier;

    /**
     * @var
     */
    protected $entrance_id;

    /**
     * @return mixed
     */
    public function getEntranceId()
    {
        return $this->entrance_id;
    }

    /**
     * @param mixed $entrance_id
     */
    public function setEntranceId($entrance_id)
    {
        $this->entrance_id = $entrance_id;
    }

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