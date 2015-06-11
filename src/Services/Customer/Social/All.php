<?php namespace Buzz\Control\Services\Customer\Social;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\Customer\Social;

/**
 * Class All
 *
 * @package Buzz\Control\Services\Customer\Social
 */
class All implements Service
{
    /**
     * @var Customer
     */
    private $customer;

    /**
     * @param Customer $customer
     *
     * @throws ErrorException
     */
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
        return 'get';
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
        return [];
    }

    /**
     * @param $response
     *
     * @return array
     */
    public function decorate($response)
    {
        $decorated = [];

        foreach ($response as $social) {
            array_push($decorated, Social::createFromArray($social));
        }

        return $decorated;
    }
}