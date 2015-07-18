<?php namespace Buzz\Control\Services\Exhibitor;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Services\Service;

/**
 * Class CustomerService
 *
 * @package Buzz\Control\Services\Exhibitor
 */
class CustomerService extends Service
{
    /**
     * @var
     */
    protected static $cast = Exhibitor\Customer::class;

    /**
     * @param Exhibitor  $exhibitor
     * @param Customer[] $customers
     *
     * @return Customer[]
     * @throws ErrorException
     */
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

    /**
     * @param Exhibitor  $exhibitor
     * @param Customer[] $customers
     *
     * @return Customer[]
     * @throws ErrorException
     */
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