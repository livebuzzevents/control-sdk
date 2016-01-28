<?php namespace Buzz\Control\Objects\Traits;

/**
 * Class CreatedByCustomer
 *
 * @package Buzz\Control\Objects\Traits
 */
trait CreatedByCustomer
{
    /**
     * @var string
     */
    protected $created_by_customer_id;

    /**
     * @var \Buzz\Control\Objects\Customer
     */
    protected $created_by_customer;

    /**
     * @return \Buzz\Control\Objects\Customer
     */
    public function getCreatedByCustomer()
    {
        return $this->created_by_customer;
    }

    /**
     * @return string
     */
    public function getCreatedByCustomerId()
    {
        return $this->created_by_customer_id;
    }

    /**
     * @param string $created_by_customer_id
     */
    public function setCreatedByCustomerId($created_by_customer_id)
    {
        $this->created_by_customer_id = $created_by_customer_id;
    }
}