<?php namespace Buzz\Control\Services\Customer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;

class SaveMany implements Service
{
    /**
     * @var Customer[]
     */
    private $customers;

    /**
     * @param Customer[] $customers
     *
     * @throws ErrorException
     */
    public function __construct(array $customers)
    {
        foreach ($customers as $customer) {
            if (!$customer->getId() && !$customer->getCampaignId()) {
                throw new ErrorException('Customer id or Campaign id required!');
            }
        }

        $this->customers = $customers;
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
        return "customers";
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        $customers = [];

        foreach ($this->customers as $customer) {
            $customers[] = $customer->toArray();
        }

        return ['batch' => $customers];
    }

    /**
     * @param $response
     *
     * @return static
     */
    public function decorate($response)
    {
        $decorated = [];

        foreach ($response as $key => $customer) {
            $decorated[$key] = Customer::createFromArray($customer);
        }

        return $decorated;
    }
}