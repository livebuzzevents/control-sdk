<?php namespace Buzz\Control\Services\Customer;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Services\Service;

class SocialService extends Service
{
    protected static $cast = Customer\Social::class;

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

    public function deleteMany(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        $this->call('delete', "customer/{$customer->getId()}/socials");
    }

    public function getMany(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        return $this->callAndCastMany('get', "customer/{$customer->getId()}/socials");
    }

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