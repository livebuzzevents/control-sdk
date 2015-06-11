<?php namespace Buzz\Control\Services\Customer\Phone;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\Customer\Phone;

class Create implements Service
{
    /**
     * @var Customer
     */
    private $customer;
    /**
     * @var Phone
     */
    private $phone;

    /**
     * @param Customer $customer
     * @param Phone    $phone
     *
     * @throws ErrorException
     */
    public function __construct(Customer $customer, Phone $phone)
    {
        if (empty($customer->getId())) {
            throw new ErrorException('Customer id required!');
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
        return 'post';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "customer/{$this->customer->getId()}/phone";
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return $this->phone->toArray();
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