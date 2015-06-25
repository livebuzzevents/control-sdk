<?php namespace Buzz\Control\Services\Customer\Property;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\Customer\Property;
use Buzz\Control\Objects\Parameter;

class Save implements Service
{
    /**
     * @var Customer
     */
    private $customer;
    /**
     * @var Property
     */
    private $property;

    public function __construct(Customer $customer, Property $property)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        $this->customer = $customer;
        $this->property = $property;
    }

    /**
     * Gets the HTTP verb of the api call
     *
     * @return mixed
     */
    public function getMethod()
    {
        return $this->property->getId() ? 'put' : 'post';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "customer/{$this->customer->getId()}/property" . ($this->property->getId() ? "/{$this->property->getId()}" : '');
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return $this->property->toArray();
    }

    /**
     * @param $result
     *
     * @return static
     */
    public function decorate($result)
    {
        $result['parameter'] = Parameter::createFromArray($result['parameter']);

        return Property::createFromArray($result);
    }
}