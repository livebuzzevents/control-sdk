<?php namespace Buzz\Control\Objects\Traits;

/**
 * Class BelongsToCustomer
 *
 * @package Buzz\Control\Objects\Traits
 */
trait BelongsToCustomer
{
    /**
     * @var string
     */
    protected $customer_id;

    /**
     * @var \Buzz\Control\Objects\Customer
     */
    protected $customer;

    /**
     * @return \Buzz\Control\Objects\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @return string
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * @param string $customer_id
     */
    public function setCustomerId($customer_id)
    {
        $this->customer_id = $customer_id;
    }
}