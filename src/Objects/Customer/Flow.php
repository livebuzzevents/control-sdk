<?php namespace Buzz\Control\Objects\Customer;

use Buzz\Control\Objects\Base;
use Buzz\Control\Objects\Traits\BelongsToCustomer;
use Buzz\Control\Objects\Traits\BelongsToStream;

/**
 * Class Flow
 *
 * @package Buzz\Control\Objects\Customer
 */
class Flow extends Base
{
    use BelongsToCustomer, BelongsToStream;

    /**
     * @var int
     */
    protected $step;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var array
     */
    protected $current_items;

    /**
     * @var array
     */
    protected $saved_items;

    /**
     * @return int
     */
    public function getStep()
    {
        return $this->step;
    }

    /**
     * @param int $step
     */
    public function setStep($step)
    {
        $this->step = $step;
    }

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
     * @return array
     */
    public function getCurrentItems()
    {
        return $this->current_items;
    }

    /**
     * @param array $current_items
     */
    public function setCurrentItems($current_items)
    {
        $this->current_items = $current_items;
    }

    /**
     * @return array
     */
    public function getSavedItems()
    {
        return $this->saved_items;
    }

    /**
     * @param array $saved_items
     */
    public function setSavedItems($saved_items)
    {
        $this->saved_items = $saved_items;
    }
}
