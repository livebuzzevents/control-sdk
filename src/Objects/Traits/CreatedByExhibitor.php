<?php namespace Buzz\Control\Objects\Traits;

/**
 * Class CreatedByExhibitor
 *
 * @package Buzz\Control\Objects\Traits
 */
trait CreatedByExhibitor
{
    /**
     * @var string
     */
    protected $created_by_exhibitor_id;

    /**
     * @var \Buzz\Control\Objects\Exhibitor
     */
    protected $created_by_exhibitor;

    /**
     * @return \Buzz\Control\Objects\Exhibitor
     */
    public function getCreatedByExhibitor()
    {
        return $this->created_by_exhibitor;
    }

    /**
     * @return string
     */
    public function getCreatedByExhibitorId()
    {
        return $this->created_by_exhibitor_id;
    }

    /**
     * @param string $created_by_exhibitor_id
     */
    public function setCreatedByExhibitorId($created_by_exhibitor_id)
    {
        $this->created_by_exhibitor_id = $created_by_exhibitor_id;
    }
}