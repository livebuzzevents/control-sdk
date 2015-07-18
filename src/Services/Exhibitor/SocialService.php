<?php namespace Buzz\Control\Services\Exhibitor;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Services\Service;

class SocialService extends Service
{
    protected static $cast = Exhibitor\Social::class;

    public function get(Exhibitor $exhibitor, Exhibitor\Social $social)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        if (!$social->getId()) {
            throw new ErrorException('Social id required!');
        }

        return $this->callAndCast('get', "exhibitor/{$exhibitor->getId()}/social/{$social->getId()}");
    }

    public function delete(Exhibitor $exhibitor, Exhibitor\Social $social)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        if (!$social->getId()) {
            throw new ErrorException('Social id required!');
        }

        $this->call('delete', "exhibitor/{$exhibitor->getId()}/social/{$social->getId()}");
    }

    public function save(Exhibitor $exhibitor, Exhibitor\Social $social)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        if ($social->getId()) {
            $verb = 'put';
            $url  = "exhibitor/{$exhibitor->getId()}/social/{$social->getId()}";
        } else {
            $verb = 'post';
            $url  = "exhibitor/{$exhibitor->getId()}/social";
        }

        return $this->callAndCast($verb, $url, $social->toArray());
    }

    public function deleteMany(Exhibitor $exhibitor)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        $this->call('delete', "exhibitor/{$exhibitor->getId()}/socials");
    }

    public function getMany(Exhibitor $exhibitor)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        return $this->callAndCastMany('get', "exhibitor/{$exhibitor->getId()}/socials");
    }

    public function saveMany(Exhibitor $exhibitor, array $socials)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        foreach ($socials as $key => $social) {
            $socials[$key] = $social->toArray();
        }

        return $this->callAndCastMany('post', "exhibitor/{$exhibitor->getId()}/socials", ['batch' => $socials]);
    }
}