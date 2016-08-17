<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToCustomer;

/**
 * Class Order
 *
 * @package Buzz\Control\Objects
 */
class Extra extends Object
{
    use BelongsToCustomer;

    /**
     * @var string
     */
    protected $model_name;

    /**
     * @var string
     */
    protected $model_id;
}
