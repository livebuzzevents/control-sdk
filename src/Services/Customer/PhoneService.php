<?php namespace Buzz\Control\Services\Customer;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Services\Service;

class PhoneService extends Service
{
    protected static $cast = Customer\Phone::class;

    public function get(Customer $customer, Customer\Phone $phone)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if (!$phone->getId()) {
            throw new ErrorException('Phone id required!');
        }

        return $this->callAndCast('get', "customer/{$customer->getId()}/phone/{$phone->getId()}");
    }

    public function delete(Customer $customer, Customer\Phone $phone)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if (!$phone->getId()) {
            throw new ErrorException('Phone id required!');
        }

        $this->call('delete', "customer/{$customer->getId()}/phone/{$phone->getId()}");
    }

    public function save(Customer $customer, Customer\Phone $phone)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if ($phone->getId()) {
            $verb = 'put';
            $url  = "customer/{$customer->getId()}/phone/{$phone->getId()}";
        } else {
            $verb = 'post';
            $url  = "customer/{$customer->getId()}/phone";
        }

        return $this->callAndCast($verb, $url, $phone->toArray());
    }

    public function deleteMany(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        $this->call('delete', "customer/{$customer->getId()}/phones");
    }

    public function getMany(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        return $this->callAndCastMany('get', "customer/{$customer->getId()}/phones");
    }

    public function saveMany(Customer $customer, array $phones)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        foreach ($phones as $key => $phone) {
            $phones[$key] = $phone->toArray();
        }

        return $this->callAndCastMany('post', "customer/{$customer->getId()}/phones", ['batch' => $phones]);
    }
}