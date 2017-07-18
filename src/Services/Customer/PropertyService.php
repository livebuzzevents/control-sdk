<?php namespace Buzz\Control\Services\Customer;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Services\Service;

/**
 * Class PropertyService
 *
 * @package Buzz\Control\Services\Customer
 */
class PropertyService extends Service
{
    /**
     * @var
     */
    protected static $cast = Customer\Property::class;

    /**
     * @param Customer $customer
     * @param Customer\Property $property
     *
     * @return Customer\Property
     * @throws ErrorException
     */
    public function get(Customer $customer, Customer\Property $property)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if (!$property->getId()) {
            throw new ErrorException('Property id required!');
        }

        return $this->callAndCast('get', "customer/{$customer->getId()}/property/{$property->getId()}");
    }

    /**
     * @param Customer $customer
     * @param Customer\Property $property
     *
     * @throws ErrorException
     */
    public function delete(Customer $customer, Customer\Property $property)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if (!$property->getId()) {
            throw new ErrorException('Property id required!');
        }

        $this->call('delete', "customer/{$customer->getId()}/property/{$property->getId()}");
    }

    /**
     * @param Customer $customer
     * @param Customer\Property $property
     *
     * @return Customer\Property
     * @throws ErrorException
     */
    public function save(Customer $customer, Customer\Property $property)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if ($property->getId()) {
            $verb = 'put';
            $url  = "customer/{$customer->getId()}/property/{$property->getId()}";
        } else {
            $verb = 'post';
            $url  = "customer/{$customer->getId()}/property";
        }

        return $this->callAndCast($verb, $url, $property->toArray());
    }

    /**
     * @param Customer $customer
     *
     * @throws ErrorException
     */
    public function deleteMany(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        $this->call('delete', "customer/{$customer->getId()}/properties");
    }

    /**
     * @param Customer $customer
     *
     * @return Customer\Property[]
     * @throws ErrorException
     */
    public function getMany(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        return $this->callAndCastMany('get', "customer/{$customer->getId()}/properties");
    }

    /**
     * @param Customer $customer
     * @param Customer\Property[] $properties
     *
     * @return Customer\Property[]
     * @throws ErrorException
     */
    public function saveMany(Customer $customer, array $properties)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        foreach ($properties as $key => $property) {
            $properties[$key] = $property->toArray();
        }

        return $this->callAndCastMany('post', "customer/{$customer->getId()}/properties", ['batch' => $properties]);
    }
}
