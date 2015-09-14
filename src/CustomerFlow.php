<?php namespace Buzz\Control;

use Buzz\Control\Exceptions\ErrorException;
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
     * @var string
     */
    private $origin;

    /**
     * Instantiates and fills Rest SDK customer flow
     *
     * @param Customer $customer
     * @param string   $origin
     */
    public function __construct(Customer $customer = null, $origin = null)
    {
        $this->setCustomer($customer);
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

    public function getFlow()
    {
        if (!$this->origin) {
            throw new ErrorException('Origin is required for flow');
        }

        if (!$this->customer) {
            return ['origin' => $this->origin];
        }

        return [
            'customer_id' => $this->customer->id,
            'origin'      => $this->origin,
        ];
    }
}