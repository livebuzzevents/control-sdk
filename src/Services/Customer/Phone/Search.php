<?php namespace Buzz\Control\Services\Customer\Phone;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\Customer\Phone;

/**
 * Class Search
 *
 * @package Buzz\Control\Services\Customer\Phone
 */
class Search implements Service
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
        if (!$customer->getId()) {
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
        return "customer/{$this->customer->getId()}/phone";
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

        foreach ($response as $key => $phone) {
            $decorated[$key] = Phone::createFromArray($phone);
        }

        return $decorated;
    }
}