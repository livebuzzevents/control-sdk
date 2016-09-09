<?php namespace Buzz\Control\Objects\Traits;

/**
 * Class BelongsToCreator
 *
 * @package Buzz\Control\Objects\Traits
 */
trait BelongsToCreator
{
    /**
     * @var string
     */
    protected $creator_id;

    /**
     * @var \Buzz\Control\Objects\Creator
     */
    protected $creator;

    /**
     * @return \Buzz\Control\Objects\Creator
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * @return string
     */
    public function getCreatorId()
    {
        return $this->creator_id;
    }

    /**
     * @param string $creator_id
     */
    public function setCreatorId($creator_id)
    {
        $this->creator_id = $creator_id;
    }
}
