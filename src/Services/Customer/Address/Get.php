<?php namespace Buzz\Control\Services\Customer\Address;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\Customer\Address;

class Get implements Service
{
    /**
     * @var Customer
     */
    private $customer;
    /**
     * @var Address
     */
    private $address;

    public function __construct(Customer $customer, Address $address)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if (!$address->getId()) {
            throw new ErrorException('Address id required!');
        }

        $this->customer = $customer;
        $this->address  = $address;
    }

    /**
     * Gets the HTTP verb of the api call
     *
     * @return mixed
     */
    public function getMethod()
    {
        return 'get';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "customer/{$this->customer->getId()}/address/{$this->address->getId()}";
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return [];
    }

    public function decorate($response)
    {
        return Address::createFromArray($response);
    }
}