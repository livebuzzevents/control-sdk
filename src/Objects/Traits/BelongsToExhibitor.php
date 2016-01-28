<?php namespace Buzz\Control\Objects\Traits;

/**
 * Class BelongsToExhibitor
 *
 * @package Buzz\Control\Objects\Traits
 */
trait BelongsToExhibitor
{
    /**
     * @var string
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
     * @return string
     */
    public function getExhibitorId()
    {
        return $this->exhibitor_id;
    }

    /**
     * @param string $exhibitor_id
     */
    public function setExhibitorId($exhibitor_id)
    {
        $this->exhibitor_id = $exhibitor_id;
    }
}