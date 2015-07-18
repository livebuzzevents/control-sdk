<?php namespace Buzz\Control\Services\Badge;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Badge;
use Buzz\Control\Services\Service;

class PropertyService extends Service
{
    protected static $cast = Badge\Property::class;

    public function get(Badge $customer, Badge\Property $property)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Badge id required!');
        }

        if (!$property->getId()) {
            throw new ErrorException('Property id required!');
        }

        return $this->callAndCast('get', "customer/{$customer->getId()}/property/{$property->getId()}");
    }

    public function delete(Badge $customer, Badge\Property $property)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Badge id required!');
        }

        if (!$property->getId()) {
            throw new ErrorException('Property id required!');
        }

        $this->call('delete', "customer/{$customer->getId()}/property/{$property->getId()}");
    }

    public function save(Badge $customer, Badge\Property $property)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Badge id required!');
        }

        if ($property->getId()) {
            $verb = 'put';
            $url  = "customer/{$customer->getId()}/property/{$property->getId()}";
        } else {
            $verb = 'post';
            $url  = "customer/{$customer->getId()}/property";
        }

        return $this->callAndCast($verb, $url, $property->toArray());
    }

    public function deleteMany(Badge $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Badge id required!');
        }

        $this->call('delete', "customer/{$customer->getId()}/properties");
    }

    public function getMany(Badge $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Badge id required!');
        }

        return $this->callAndCastMany('get', "customer/{$customer->getId()}/properties");
    }

    public function saveMany(Badge $customer, array $properties)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Badge id required!');
        }

        foreach ($properties as $key => $property) {
            $properties[$key] = $property->toArray();
        }

        return $this->callAndCastMany('post', "customer/{$customer->getId()}/properties", ['batch' => $properties]);
    }
}