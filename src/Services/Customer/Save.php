<?php namespace Buzz\Control\Services\Customer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;

class Save implements Service
{
    /**
     * @var Customer
     */
    private $customer;

    public function __construct(Customer $customer)
    {
        if (!$customer->getId() && !$customer->getCampaignId()) {
            throw new ErrorException('Customer id or Campaign id required!');
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
        return $this->customer->getId() ? 'put' : 'post';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "customer/" . ($this->customer->getId() ?: $this->customer->getCampaignId());
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