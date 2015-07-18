<?php namespace Buzz\Control\Services\Exhibitor;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Services\Service;

class CustomerService extends Service
{
    protected static $cast = Exhibitor\Customer::class;

    public function attach(Exhibitor $exhibitor, array $customers)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        foreach ($customers as $key => $customer) {
            if (!$customer->getId()) {
                throw new ErrorException('Customer id required!');
            }
            
            $customers[$key] = $customer->toArray();
        }

        return $this->callAndCast('post', "exhibitor/{$exhibitor->getId()}/customer", compact('customers'));
    }

    public function detach(Exhibitor $exhibitor, array $customers)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        foreach ($customers as $key => $customer) {
            if (!$customer->getId()) {
                throw new ErrorException('Customer id required!');
            }

            $customers[$key] = $customer->toArray();
        }

        return $this->callAndCast('delete', "exhibitor/{$exhibitor->getId()}/customer", compact('customers'));
    }
}