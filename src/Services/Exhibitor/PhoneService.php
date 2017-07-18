<?php namespace Buzz\Control\Services\Exhibitor;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Services\Service;

/**
 * Class PhoneService
 *
 * @package Buzz\Control\Services\Exhibitor
 */
class PhoneService extends Service
{
    /**
     * @var
     */
    protected static $cast = Exhibitor\Phone::class;

    /**
     * @param Exhibitor $exhibitor
     * @param Exhibitor\Phone $phone
     *
     * @return Exhibitor\Phone
     * @throws ErrorException
     */
    public function get(Exhibitor $exhibitor, Exhibitor\Phone $phone)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        if (!$phone->getId()) {
            throw new ErrorException('Phone id required!');
        }

        return $this->callAndCast('get', "exhibitor/{$exhibitor->getId()}/phone/{$phone->getId()}");
    }

    /**
     * @param Exhibitor $exhibitor
     * @param Exhibitor\Phone $phone
     *
     * @throws ErrorException
     */
    public function delete(Exhibitor $exhibitor, Exhibitor\Phone $phone)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        if (!$phone->getId()) {
            throw new ErrorException('Phone id required!');
        }

        $this->call('delete', "exhibitor/{$exhibitor->getId()}/phone/{$phone->getId()}");
    }

    /**
     * @param Exhibitor $exhibitor
     * @param Exhibitor\Phone $phone
     *
     * @return Exhibitor\Phone
     * @throws ErrorException
     */
    public function save(Exhibitor $exhibitor, Exhibitor\Phone $phone)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        if ($phone->getId()) {
            $verb = 'put';
            $url  = "exhibitor/{$exhibitor->getId()}/phone/{$phone->getId()}";
        } else {
            $verb = 'post';
            $url  = "exhibitor/{$exhibitor->getId()}/phone";
        }

        return $this->callAndCast($verb, $url, $phone->toArray());
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

        $this->call('delete', "exhibitor/{$exhibitor->getId()}/phones");
    }

    /**
     * @param Exhibitor $exhibitor
     *
     * @return Exhibitor\Phone[]
     * @throws ErrorException
     */
    public function getMany(Exhibitor $exhibitor)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        return $this->callAndCastMany('get', "exhibitor/{$exhibitor->getId()}/phones");
    }

    /**
     * @param Exhibitor $exhibitor
     * @param Exhibitor\Phone[] $phones
     *
     * @return Exhibitor\Phone[]
     * @throws ErrorException
     */
    public function saveMany(Exhibitor $exhibitor, array $phones)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        foreach ($phones as $key => $phone) {
            $phones[$key] = $phone->toArray();
        }

        return $this->callAndCastMany('post', "exhibitor/{$exhibitor->getId()}/phones", ['batch' => $phones]);
    }
}
