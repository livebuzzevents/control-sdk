<?php namespace Buzz\Control\Services\Customer\Phone;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\Customer\Phone;

class Get implements Service
{
    /**
     * @var Customer
     */
    private $customer;
    /**
     * @var Phone
     */
    private $phone;

    public function __construct(Customer $customer, Phone $phone)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if (!$phone->getId()) {
            throw new ErrorException('Phone id required!');
        }

        $this->customer = $customer;
        $this->phone    = $phone;
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
        return "customer/{$this->customer->getId()}/phone/{$this->phone->getId()}";
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

    /**
     * @param $result
     *
     * @return static
     */
    public function decorate($result)
    {
        return Phone::createFromArray($result);
    }
}