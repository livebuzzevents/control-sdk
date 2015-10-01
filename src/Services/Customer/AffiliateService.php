<?php namespace Buzz\Control\Services\Customer;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Services\Service;

/**
 * Class AffiliateService
 *
 * @package Buzz\Control\Services\Customer
 */
class AffiliateService extends Service
{
    /**
     * @var
     */
    protected static $cast = Customer\Affiliate::class;

    /**
     * @param Customer           $customer
     * @param Customer\Affiliate $affiliate
     *
     * @return Customer\Affiliate
     * @throws ErrorException
     */
    public function get(Customer $customer, Customer\Affiliate $affiliate)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if (!$affiliate->getId()) {
            throw new ErrorException('Affiliate id required!');
        }

        return $this->callAndCast('get', "customer/{$customer->getId()}/affiliate/{$affiliate->getId()}");
    }

    /**
     * @param Customer           $customer
     * @param Customer\Affiliate $affiliate
     *
     * @throws ErrorException
     */
    public function delete(Customer $customer, Customer\Affiliate $affiliate)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if (!$affiliate->getId()) {
            throw new ErrorException('Affiliate id required!');
        }

        $this->call('delete', "customer/{$customer->getId()}/affiliate/{$affiliate->getId()}");
    }

    /**
     * @param Customer           $customer
     * @param Customer\Affiliate $affiliate
     *
     * @return Customer\Affiliate
     * @throws ErrorException
     */
    public function save(Customer $customer, Customer\Affiliate $affiliate)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if ($affiliate->getId()) {
            $verb = 'put';
            $url  = "customer/{$customer->getId()}/affiliate/{$affiliate->getId()}";
        } else {
            $verb = 'post';
            $url  = "customer/{$customer->getId()}/affiliate";
        }

        return $this->callAndCast($verb, $url, $affiliate->toArray());
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

        $this->call('delete', "customer/{$customer->getId()}/affiliates");
    }

    /**
     * @param Customer $customer
     *
     * @return Customer\Affiliate[]
     * @throws ErrorException
     */
    public function getMany(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        return $this->callAndCastMany('get', "customer/{$customer->getId()}/affiliates");
    }

    /**
     * @param Customer             $customer
     * @param Customer\Affiliate[] $affiliates
     *
     * @return Customer\Affiliate[]
     * @throws ErrorException
     */
    public function saveMany(Customer $customer, array $affiliates)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        foreach ($affiliates as $key => $affiliate) {
            $affiliates[$key] = $affiliate->toArray();
        }

        return $this->callAndCastMany('post', "customer/{$customer->getId()}/affiliates", ['batch' => $affiliates]);
    }
}