<?php namespace Buzz\Control\Services\Exhibitor\Customer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;

/**
 * Class Create
 *
 * @package Buzz\Control\Services\Exhibitor
 */
class Detach implements Service
{
    /**
     * @var Exhibitor
     */
    private $exhibitor;
    /**
     * @var array
     */
    private $customers;

    /**
     * @param Exhibitor $exhibitor
     * @param array     $customers
     *
     * @throws ErrorException
     *
     */
    public function __construct(Exhibitor $exhibitor, array $customers)
    {
        if (!$customers)) {
            throw new ErrorException('Customers required!');
        }

        foreach ($customers as $customer) {
            if (!$customer instanceof Exhibitor\Customer) {
                throw new ErrorException('Customers should be instance of:' . Exhibitor\Customer::class);
            }
        }

        $this->exhibitor = $exhibitor;
        $this->customers = $customers;
    }

    /**
     * Gets the HTTP verb of the api call
     *
     * @return mixed
     */
    public function getMethod()
    {
        return 'delete';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return 'exhibitor/' . $this->exhibitor->getId() . '/customer';
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        $customers = $this->customers;

        foreach ($customers as &$customer) {
            $customer = $customer->toArray();
        }

        return compact('customers');
    }

    /**
     * @param $result
     *
     * @return static
     */
    public function decorate($result)
    {
        return true;
    }
}