<?php namespace Buzz\Control\Objects\Traits;

/**
 * Class HasStatus
 *
 * @package Buzz\Control\Objects\Traits
 */
trait HasStatus
{
    /**
     * @var string
     */
    protected $status;

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
