<?php namespace Buzz\Control\Services\Customer\Property;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Parameter;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\Customer\Property;

class Create implements Service
{
    /**
     * @var Customer
     */
    private $customer;
    /**
     * @var Property
     */
    private $property;

    /**
     * @param Customer     $customer
     * @param Property $property
     *
     * @throws ErrorException
     */
    public function __construct(Customer $customer, Property $property)
    {
        if (empty($customer->getId())) {
            throw new ErrorException('Customer id required!');
        }

        if (empty($property->getParameter())) {
            throw new ErrorException('Parameter required!');
        }

        $this->customer     = $customer;
        $this->property = $property;
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
        return "customer/{$this->customer->getId()}/property";
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