<?php namespace Buzz\Control\Services\Exhibitor;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Services\Service;

class AddressService extends Service
{
    protected static $cast = Exhibitor\Address::class;

    public function get(Exhibitor $exhibitor, Exhibitor\Address $address)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        if (!$address->getId()) {
            throw new ErrorException('Address id required!');
        }

        return $this->callAndCast('get', "exhibitor/{$exhibitor->getId()}/address/{$address->getId()}");
    }

    public function delete(Exhibitor $exhibitor, Exhibitor\Address $address)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        if (!$address->getId()) {
            throw new ErrorException('Address id required!');
        }

        $this->call('delete', "exhibitor/{$exhibitor->getId()}/address/{$address->getId()}");
    }

    public function save(Exhibitor $exhibitor, Exhibitor\Address $address)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        if ($address->getId()) {
            $verb = 'put';
            $url  = "exhibitor/{$exhibitor->getId()}/address/{$address->getId()}";
        } else {
            $verb = 'post';
            $url  = "exhibitor/{$exhibitor->getId()}/address";
        }

        return $this->callAndCast($verb, $url, $address->toArray());
    }

    public function deleteMany(Exhibitor $exhibitor)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        $this->call('delete', "exhibitor/{$exhibitor->getId()}/addresses");
    }

    public function getMany(Exhibitor $exhibitor)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        return $this->callAndCastMany('get', "exhibitor/{$exhibitor->getId()}/addresses");
    }

    public function saveMany(Exhibitor $exhibitor, array $addresses)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        foreach ($addresses as $key => $address) {
            $addresses[$key] = $address->toArray();
        }

        return $this->callAndCastMany('post', "exhibitor/{$exhibitor->getId()}/addresses", ['batch' => $addresses]);
    }
}