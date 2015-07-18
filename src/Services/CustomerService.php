<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;

class CustomerService extends Service
{
    protected static $cast = Customer::class;

    public function login(array $credentials)
    {
        return $this->callAndCast('get', 'customer/login', $credentials);
    }

    public function get(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        return $this->callAndCast('get', "customer/{$customer->getId()}");
    }

    public function delete(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        $this->call('delete', "customer/{$customer->getId()}");
    }

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

    public function deleteMany()
    {
        $this->call('delete', 'customers');
    }

    public function getMany()
    {
        return $this->callAndCastMany('get', 'customers');
    }

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