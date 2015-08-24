<?php namespace Buzz\Control\Objects\Customer;

use Buzz\Control\Objects\Object;
use Buzz\Control\Objects\Traits\BelongsToCustomer;

/**
 * Class Flow
 *
 * @package Buzz\Control\Objects\Customer
 */
class Flow extends Object
{
    use BelongsToCustomer;

    /**
     * @var int
     */
    protected $step;

    /**
     * @var string
     */
    protected $origin;

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
}
