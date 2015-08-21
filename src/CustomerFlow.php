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
     * @var int
     */
    private $step;

    /**
     * @var string
     */
    private $origin;

    /**
     * Instantiates and fills Rest SDK customer flow
     *
     * @param Customer $customer
     * @param int      $step
     * @param string   $origin
     */
    public function __construct(Customer $customer, $step, $origin)
    {
        $this->setCustomer($customer);
        $this->setStep($step);
        $this->setOrigin($origin);
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
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * @param string $origin
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;
    }
}