<?php namespace Buzz\Control\Objects\Traits;

/**
 * Class HasSharedId
 *
 * @package Buzz\Control\Objects\Traits
 */
trait HasSharedId
{
    /**
     * @var string
     */
    protected $shared_id;

    /**
     * @return string
     */
    public function getSharedId()
    {
        return $this->shared_id;
    }

    /**
     * @param string $shared_id
     */
    public function setSharedId($shared_id)
    {
        $this->shared_id = $shared_id;
    }
}