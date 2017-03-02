<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Objects\Exhibitor\PressRelease;

/**
 * Class PressReleaseService
 *
 * @package Buzz\Control\Services
 */
class PressReleaseService extends Service
{
    /**
     * @var
     */
    protected static $cast = PressRelease::class;

    /**
     * @param Exhibitor    $exhibitor
     * @param PressRelease $pressRelease
     * @return mixed
     * @throws ErrorException
     */
    public function get(Exhibitor $exhibitor, PressRelease $pressRelease)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        if (!$pressRelease->getId()) {
            throw new ErrorException('PressRelease id required!');
        }

        return $this->callAndCast('get', "exhibitor/{$exhibitor->getId()}/press-release/{$pressRelease->getId()}");
    }

    /**
     * @param Exhibitor    $exhibitor
     * @param PressRelease $pressRelease
     * @throws ErrorException
     */
    public function delete(Exhibitor $exhibitor, PressRelease $pressRelease)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        if (!$pressRelease->getId()) {
            throw new ErrorException('PressRelease id required!');
        }

        $this->call('delete', "exhibitor/{$exhibitor->getId()}/press-release/{$pressRelease->getId()}");
    }

    /**
     * @param Exhibitor    $exhibitor
     * @param PressRelease $pressRelease
     * @return mixed
     * @throws ErrorException
     */
    public function save(Exhibitor $exhibitor, PressRelease $pressRelease)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        if ($pressRelease->getId()) {
            $verb = 'put';
            $url  = 'press-release/' . $pressRelease->getId();
        } else {
            $verb = 'post';
            $url  = 'press-release';
        }

        return $this->callAndCast($verb, "exhibitor/{$exhibitor->getId()}/{$url}", $pressRelease->toArray());
    }

    /**
     * @param Exhibitor $exhibitor
     * @throws ErrorException
     */
    public function deleteMany(Exhibitor $exhibitor)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        $this->call('delete', "exhibitor/{$exhibitor->getId()}/press-releases");
    }

    /**
     * @param Exhibitor $exhibitor
     * @return PressRelease[]
     * @throws ErrorException
     */
    public function getMany(Exhibitor $exhibitor)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        return $this->callAndCastMany('get', "exhibitor/{$exhibitor->getId()}/press-releases");
    }

    /**
     * @param Exhibitor      $exhibitor
     * @param PressRelease[] $pressReleases
     * @return PressRelease[]
     * @throws ErrorException
     */
    public function saveMany(Exhibitor $exhibitor, array $pressReleases)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        foreach ($pressReleases as $key => $pressRelease) {
            $pressReleases[$key] = $pressRelease->toArray();
        }

        return $this->callAndCastMany('post', "exhibitor/{$exhibitor->getId()}/press-releases",
            ['batch' => $pressReleases]);
    }
}
