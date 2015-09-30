<?php namespace Buzz\Control;

use Buzz\Control\Objects\Customer;

/**
 * Class Credentials
 *
 * Holds the api credentials for the SDK REST calls
 *
 * @package Buzz\Control
 */
class CustomerFlow
{
    /**
     * @var Customer
     */
    private $customer;

    /**
     * Instantiates and fills Rest SDK customer flow
     *
     * @param Customer|null $customer
     */
    public function __construct(Customer $customer = null)
    {
        $this->setCustomer($customer);
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    public function getFlow()
    {
        return ['customer_id' => $this->customer->id];
    }
}