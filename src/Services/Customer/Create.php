<?php namespace Buzz\Control\Services\Customer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Campaign;
use Buzz\Control\Objects\Customer;

/**
 * Class Create
 *
 * @package Buzz\Control\Services\Customer
 */
class Create implements Service
{
    /**
     * @var Customer
     */
    private $customer;
    /**
     * @var Campaign
     */
    private $campaign;

    /**
     * @param Customer $customer
     * @param Campaign $campaign
     *
     * @throws ErrorException
     */
    public function __construct(Customer $customer, Campaign $campaign)
    {
        if (empty($campaign->getId())) {
            throw new ErrorException('Campaign id required!');
        }

        $this->customer = $customer;
        $this->campaign = $campaign;
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
        return 'customer/' . $this->campaign->getId();
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