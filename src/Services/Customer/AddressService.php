<?php namespace Buzz\Control\Services\Customer;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Services\Service;

/**
 * Class AddressService
 *
 * @package Buzz\Control\Services\Customer
 */
class AddressService extends Service
{
    /**
     * @var
     */
    protected static $cast = Customer\Address::class;

    /**
     * @param Customer $customer
     * @param Customer\Address $address
     *
     * @return Customer\Address
     * @throws ErrorException
     */
    public function get(Customer $customer, Customer\Address $address)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if (!$address->getId()) {
            throw new ErrorException('Address id required!');
        }

        return $this->callAndCast('get', "customer/{$customer->getId()}/address/{$address->getId()}");
    }

    /**
     * @param Customer $customer
     * @param Customer\Address $address
     *
     * @throws ErrorException
     */
    public function delete(Customer $customer, Customer\Address $address)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if (!$address->getId()) {
            throw new ErrorException('Address id required!');
        }

        $this->call('delete', "customer/{$customer->getId()}/address/{$address->getId()}");
    }

    /**
     * @param Customer $customer
     * @param Customer\Address $address
     *
     * @return Customer\Address
     * @throws ErrorException
     */
    public function save(Customer $customer, Customer\Address $address)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if ($address->getId()) {
            $verb = 'put';
            $url  = "customer/{$customer->getId()}/address/{$address->getId()}";
        } else {
            $verb = 'post';
            $url  = "customer/{$customer->getId()}/address";
        }

        return $this->callAndCast($verb, $url, $address->toArray());
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

        $this->call('delete', "customer/{$customer->getId()}/addresses");
    }

    /**
     * @param Customer $customer
     *
     * @return Customer\Address[]
     * @throws ErrorException
     */
    public function getMany(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        return $this->callAndCastMany('get', "customer/{$customer->getId()}/addresses");
    }

    /**
     * @param Customer $customer
     * @param Customer\Address[] $addresses
     *
     * @return Customer\Address
     * @throws ErrorException
     */
    public function saveMany(Customer $customer, array $addresses)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        foreach ($addresses as $key => $address) {
            $addresses[$key] = $address->toArray();
        }

        return $this->callAndCastMany('post', "customer/{$customer->getId()}/addresses", ['batch' => $addresses]);
    }
}
