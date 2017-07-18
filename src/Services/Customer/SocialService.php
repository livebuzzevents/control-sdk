<?php namespace Buzz\Control\Services\Customer;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Services\Service;

/**
 * Class SocialService
 *
 * @package Buzz\Control\Services\Customer
 */
class SocialService extends Service
{
    /**
     * @var
     */
    protected static $cast = Customer\Social::class;

    /**
     * @param Customer $customer
     * @param Customer\Social $social
     *
     * @return Customer\Social
     * @throws ErrorException
     */
    public function get(Customer $customer, Customer\Social $social)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if (!$social->getId()) {
            throw new ErrorException('Social id required!');
        }

        return $this->callAndCast('get', "customer/{$customer->getId()}/social/{$social->getId()}");
    }

    /**
     * @param Customer $customer
     * @param Customer\Social $social
     *
     * @throws ErrorException
     */
    public function delete(Customer $customer, Customer\Social $social)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if (!$social->getId()) {
            throw new ErrorException('Social id required!');
        }

        $this->call('delete', "customer/{$customer->getId()}/social/{$social->getId()}");
    }

    /**
     * @param Customer $customer
     * @param Customer\Social $social
     *
     * @return Customer\Social
     * @throws ErrorException
     */
    public function save(Customer $customer, Customer\Social $social)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if ($social->getId()) {
            $verb = 'put';
            $url  = "customer/{$customer->getId()}/social/{$social->getId()}";
        } else {
            $verb = 'post';
            $url  = "customer/{$customer->getId()}/social";
        }

        return $this->callAndCast($verb, $url, $social->toArray());
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

        $this->call('delete', "customer/{$customer->getId()}/socials");
    }

    /**
     * @param Customer $customer
     *
     * @return Customer\Social[]
     * @throws ErrorException
     */
    public function getMany(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        return $this->callAndCastMany('get', "customer/{$customer->getId()}/socials");
    }

    /**
     * @param Customer $customer
     * @param Customer\Social[] $socials
     *
     * @return Customer\Social[]
     * @throws ErrorException
     */
    public function saveMany(Customer $customer, array $socials)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        foreach ($socials as $key => $social) {
            $socials[$key] = $social->toArray();
        }

        return $this->callAndCastMany('post', "customer/{$customer->getId()}/socials", ['batch' => $socials]);
    }
}
