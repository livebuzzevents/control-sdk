<?php namespace Buzz\Control\Services\Exhibitor;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Services\Service;

class PhoneService extends Service
{
    protected static $cast = Exhibitor\Phone::class;

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

    public function deleteMany(Exhibitor $exhibitor)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        $this->call('delete', "exhibitor/{$exhibitor->getId()}/phones");
    }

    public function getMany(Exhibitor $exhibitor)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        return $this->callAndCastMany('get', "exhibitor/{$exhibitor->getId()}/phones");
    }

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