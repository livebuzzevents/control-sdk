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
     * @var string
     */
    protected $custom_status;

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

    /**
     * @return string
     */
    public function getCustomStatus()
    {
        return $this->custom_status;
    }

    /**
     * @param string $custom_status
     */
    public function setCustomStatus($custom_status)
    {
        $this->custom_status = $custom_status;
    }
}