<?php namespace Buzz\Control\Services\Customer;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\Link;
use Buzz\Control\Services\Service;

/**
 * Class LinkService
 *
 * @package Buzz\Control\Services\Customer
 */
class LinkService extends Service
{
    /**
     * @var
     */
    protected static $cast = Link::class;

    /**
     * @param Customer $customer
     * @param Link $link
     *
     * @return Link
     * @throws ErrorException
     */
    public function get(Customer $customer, Link $link)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if (!$link->getId()) {
            throw new ErrorException('Link id required!');
        }

        return $this->callAndCast('get', "customer/{$customer->getId()}/link/{$link->getId()}");
    }

    /**
     * @param Customer $customer
     * @param Link $link
     *
     * @throws ErrorException
     */
    public function delete(Customer $customer, Link $link)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if (!$link->getId()) {
            throw new ErrorException('Link id required!');
        }

        $this->call('delete', "customer/{$customer->getId()}/link/{$link->getId()}");
    }

    /**
     * @param Customer $customer
     * @param Link $link
     *
     * @return Link
     * @throws ErrorException
     */
    public function save(Customer $customer, Link $link)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if ($link->getId()) {
            $verb = 'put';
            $url  = "customer/{$customer->getId()}/link/{$link->getId()}";
        } else {
            $verb = 'post';
            $url  = "customer/{$customer->getId()}/link";
        }

        return $this->callAndCast($verb, $url, $link->toArray());
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

        $this->call('delete', "customer/{$customer->getId()}/links");
    }

    /**
     * @param Customer $customer
     *
     * @return Link[]
     * @throws ErrorException
     */
    public function getMany(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        return $this->callAndCastMany('get', "customer/{$customer->getId()}/links");
    }

    /**
     * @param Customer $customer
     * @param Link[] $links
     *
     * @return Link[]
     * @throws ErrorException
     */
    public function saveMany(Customer $customer, array $links)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        foreach ($links as $key => $link) {
            $links[$key] = $link->toArray();
        }

        return $this->callAndCastMany('post', "customer/{$customer->getId()}/links", ['batch' => $links]);
    }
}
