<?php namespace Buzz\Control\Services\Customer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Objects\Customer;

/**
 * Class All
 *
 * @package Buzz\Control\Services\Customer\Address
 */
class Login implements Service
{
    /**
     * @var
     */
    protected $credentials;

    /**
     * @param array $credentials
     */
    public function __construct(array $credentials)
    {
        $this->credentials = $credentials;
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
        return "customer/login";
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return $this->credentials;
    }

    /**
     * @param $response
     *
     * @return array
     */
    public function decorate($response)
    {
        return Customer::createFromArray($response);
    }
}