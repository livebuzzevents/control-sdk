<?php namespace Buzz\Control\Services\Exhibitor;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Services\Service;

/**
 * Class AddressService
 *
 * @package Buzz\Control\Services\Exhibitor
 */
class AddressService extends Service
{
    /**
     * @var
     */
    protected static $cast = Exhibitor\Address::class;

    /**
     * @param Exhibitor $exhibitor
     * @param Exhibitor\Address $address
     *
     * @return Exhibitor\Address
     * @throws ErrorException
     */
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

    /**
     * @param Exhibitor $exhibitor
     * @param Exhibitor\Address $address
     *
     * @throws ErrorException
     */
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

    /**
     * @param Exhibitor $exhibitor
     * @param Exhibitor\Address $address
     *
     * @return Exhibitor\Address
     * @throws ErrorException
     */
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

    /**
     * @param Exhibitor $exhibitor
     *
     * @throws ErrorException
     */
    public function deleteMany(Exhibitor $exhibitor)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        $this->call('delete', "exhibitor/{$exhibitor->getId()}/addresses");
    }

    /**
     * @param Exhibitor $exhibitor
     *
     * @return Exhibitor\Address[]
     * @throws ErrorException
     */
    public function getMany(Exhibitor $exhibitor)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        return $this->callAndCastMany('get', "exhibitor/{$exhibitor->getId()}/addresses");
    }

    /**
     * @param Exhibitor $exhibitor
     * @param Exhibitor\Address[] $addresses
     *
     * @return Exhibitor\Address
     * @throws ErrorException
     */
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
