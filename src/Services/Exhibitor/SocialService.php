<?php namespace Buzz\Control\Services\Exhibitor;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Services\Service;

/**
 * Class SocialService
 *
 * @package Buzz\Control\Services\Exhibitor
 */
class SocialService extends Service
{
    /**
     * @var
     */
    protected static $cast = Exhibitor\Social::class;

    /**
     * @param Exhibitor        $exhibitor
     * @param Exhibitor\Social $social
     *
     * @return Exhibitor\Social
     * @throws ErrorException
     */
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

    /**
     * @param Exhibitor        $exhibitor
     * @param Exhibitor\Social $social
     *
     * @throws ErrorException
     */
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

    /**
     * @param Exhibitor        $exhibitor
     * @param Exhibitor\Social $social
     *
     * @return Exhibitor\Social
     * @throws ErrorException
     */
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

        $this->call('delete', "exhibitor/{$exhibitor->getId()}/socials");
    }

    /**
     * @param Exhibitor $exhibitor
     *
     * @return Exhibitor\Social[]
     * @throws ErrorException
     */
    public function getMany(Exhibitor $exhibitor)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        return $this->callAndCastMany('get', "exhibitor/{$exhibitor->getId()}/socials");
    }

    /**
     * @param Exhibitor          $exhibitor
     * @param Exhibitor\Social[] $socials
     *
     * @return Exhibitor\Social[]
     * @throws ErrorException
     */
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