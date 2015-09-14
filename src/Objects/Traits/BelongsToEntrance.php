<?php namespace Buzz\Control\Objects\Traits;

use Buzz\Control\Objects\Entrance;

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
     * @var Entrance
     */
    protected $entrance;

    /**
     * @return Entrance
     */
    public function getEntrance()
    {
        return $this->entrance;
    }

    /**
     * @param Entrance $entrance
     */
    public function setEntrance(Entrance $entrance)
    {
        $this->entrance = $entrance;
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