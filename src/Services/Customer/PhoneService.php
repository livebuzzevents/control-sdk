<?php namespace Buzz\Control\Services\Customer;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Services\Service;

/**
 * Class PhoneService
 *
 * @package Buzz\Control\Services\Customer
 */
class PhoneService extends Service
{
    /**
     * @var
     */
    protected static $cast = Customer\Phone::class;

    /**
     * @param Customer       $customer
     * @param Customer\Phone $phone
     *
     * @return Customer\Phone
     * @throws ErrorException
     */
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

    /**
     * @param Customer       $customer
     * @param Customer\Phone $phone
     *
     * @throws ErrorException
     */
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

    /**
     * @param Customer       $customer
     * @param Customer\Phone $phone
     *
     * @return Customer\Phone
     * @throws ErrorException
     */
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

        $this->call('delete', "customer/{$customer->getId()}/phones");
    }

    /**
     * @param Customer $customer
     *
     * @return Customer\Phone[]
     * @throws ErrorException
     */
    public function getMany(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        return $this->callAndCastMany('get', "customer/{$customer->getId()}/phones");
    }

    /**
     * @param Customer         $customer
     * @param Customer\Phone[] $phones
     *
     * @return Customer\Phone[]
     * @throws ErrorException
     */
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