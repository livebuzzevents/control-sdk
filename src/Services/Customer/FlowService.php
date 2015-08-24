<?php namespace Buzz\Control\Services\Customer;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Services\Service;

/**
 * Class FlowService
 *
 * @package Buzz\Control\Services\Customer
 */
class FlowService extends Service
{
    /**
     * @param Customer $customer
     *
     * @throws ErrorException
     */
    public function complete(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        $this->call('get', "customer/{$customer->getId()}/flow/complete");
    }

    /**
     * @param Customer $customer
     * @param int      $step
     *
     * @throws ErrorException
     */
    public function start(Customer $customer, $step = 1)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        $this->call('get', "customer/{$customer->getId()}/flow/start/{$step}");
    }

    /**
     * @param Customer $customer
     * @param int      $step
     *
     * @throws ErrorException
     *
     */
    public function goToStep(Customer $customer, $step)
    {
        $this->call('delete', "customer/{$customer->getId()}/flow/go-to-step/{$step}");
    }
}