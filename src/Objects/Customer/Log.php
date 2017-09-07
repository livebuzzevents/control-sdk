<?php namespace Buzz\Control\Objects\Customer;

use Buzz\Control\Objects\Base;
use Buzz\Control\Objects\Traits\BelongsToCustomer;
use Buzz\Control\Objects\Traits\BelongsToStream;

/**
 * Class Log
 *
 * @package Buzz\Control\Objects\Customer
 */
class Log extends Base
{
    use BelongsToCustomer, BelongsToStream;

    /**
     * @var string
     */
    protected $user_id;

    /**
     * @var string
     */
    protected $section;

    /**
     * @var string
     */
    protected $event;

    /**
     * @var string
     */
    protected $data;

    /**
     * @var string
     */
    protected $created_at_microtime;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * @return mixed
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getCreatedAtMicrotime()
    {
        return $this->created_at_microtime;
    }
}
