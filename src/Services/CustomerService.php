<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;

/**
 * Class CustomerService
 *
 * @package Buzz\Control\Services
 */
class CustomerService extends Service
{
    /**
     * @var
     */
    protected static $cast = Customer::class;

    /**
     * @param array $credentials
     *
     * @return Customer
     */
    public function login(array $credentials)
    {
        return $this->callAndCast('get', 'customer/login', $credentials);
    }

    /**
     * @param Customer $customer
     *
     * @return Customer
     * @throws ErrorException
     */
    public function get(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        return $this->callAndCast('get', "customer/{$customer->getId()}");
    }

    /**
     * @param Customer $customer
     *
     * @throws ErrorException
     */
    public function delete(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        $this->call('delete', "customer/{$customer->getId()}");
    }

    /**
     * @param Customer $customer
     *
     * @return Customer
     * @throws ErrorException
     */
    public function save(Customer $customer)
    {
        if (!$customer->getId() && !$customer->getCampaignId()) {
            throw new ErrorException('Customer id or Campaign id required!');
        }

        if ($customer->getId()) {
            $verb = 'put';
            $url  = 'customer/' . $customer->getId();
        } else {
            $verb = 'post';
            $url  = 'customer';
        }

        return $this->callAndCast($verb, $url, $customer->toArray());
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'customers');
    }

    /**
     * @return Customer[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'customers');
    }

    /**
     * @param Customer[] $customers
     *
     * @return Customer[]
     * @throws ErrorException
     */
    public function saveMany(array $customers)
    {
        foreach ($customers as $key => $customer) {
            if (!$customer->getId() && !$customer->getCampaignId()) {
                throw new ErrorException('Customer id or Campaign id required!');
            }

            $customers[$key] = $customer->toArray();
        }

        return $this->callAndCastMany('post', 'customers', $customers);
    }
}