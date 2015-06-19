<?php namespace Buzz\Control\Objects\Traits;

/**
 * Class BelongsToExhibitor
 *
 * @package Buzz\Control\Objects\Traits
 */
trait BelongsToExhibitor
{
    /**
     * @var int
     */
    protected $exhibitor_id;

    /**
     * @var \Buzz\Control\Objects\Exhibitor
     */
    protected $exhibitor;

    /**
     * @return \Buzz\Control\Objects\Exhibitor
     */
    public function getExhibitor()
    {
        return $this->exhibitor;
    }

    /**
     * @return int
     */
    public function getExhibitorId()
    {
        return $this->exhibitor_id;
    }

    /**
     * @param int $exhibitor_id
     */
    public function setExhibitorId($exhibitor_id)
    {
        $this->exhibitor_id = $exhibitor_id;
    }
}