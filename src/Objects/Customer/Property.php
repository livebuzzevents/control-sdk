<?php namespace Buzz\Control\Objects\Customer;

use Buzz\Control\Objects\Base;
use Buzz\Control\Objects\Traits\BelongsToCustomer;
use Buzz\Control\Objects\Traits\BelongsToParameter;

/**
 * Class Property
 *
 * @package Buzz\Control\Customer
 */
class Property extends Base
{
    use BelongsToCustomer, BelongsToParameter;

    /**
     * @var string
     */
    protected $value;

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}
