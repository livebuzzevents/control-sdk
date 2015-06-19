<?php namespace Buzz\Control\Objects\Traits;

/**
 * Class BelongsToEntrance
 *
 * @package Buzz\Control\Objects\Traits
 */
trait BelongsToEntrance
{
    /**
     * @var int
     */
    protected $entrance_id;

    /**
     * @var \Buzz\Control\Objects\Entrance
     */
    protected $entrance;

    /**
     * @return \Buzz\Control\Objects\Entrance
     */
    public function getEntrance()
    {
        return $this->entrance;
    }

    /**
     * @return int
     */
    public function getEntranceId()
    {
        return $this->entrance_id;
    }

    /**
     * @param int $entrance_id
     */
    public function setEntranceId($entrance_id)
    {
        $this->entrance_id = $entrance_id;
    }
}