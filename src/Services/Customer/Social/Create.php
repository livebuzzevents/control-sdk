<?php namespace Buzz\Control\Services\Customer\Social;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\Customer\Social;

class Create implements Service
{
    /**
     * @var Customer
     */
    private $customer;
    /**
     * @var Social
     */
    private $social;

    /**
     * @param Customer $customer
     * @param Social   $social
     *
     * @throws ErrorException
     */
    public function __construct(Customer $customer, Social $social)
    {
        if (empty($customer->getId())) {
            throw new ErrorException('Customer id required!');
        }

        $this->customer = $customer;
        $this->social   = $social;
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
        return "customer/{$this->customer->getId()}/social";
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return $this->social->toArray();
    }

    /**
     * @param $result
     *
     * @return static
     */
    public function decorate($result)
    {
        return Social::createFromArray($result);
    }
}