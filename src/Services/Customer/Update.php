<?php namespace Buzz\Control\Services\Customer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;

class Update implements Service
{
    /**
     * @var Customer
     */
    private $customer;

    public function __construct(Customer $customer)
    {
        if (empty($customer->getId())) {
            throw new ErrorException('Customer id required!');
        }

        $this->customer = $customer;
    }

    /**
     * Gets the HTTP verb of the api call
     *
     * @return mixed
     */
    public function getMethod()
    {
        return 'put';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "customer/{$this->customer->getId()}";
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return $this->customer->toArray();
    }

    /**
     * @param $result
     *
     * @return static
     */
    public function decorate($result)
    {
        return Customer::createFromArray($result);
    }
}