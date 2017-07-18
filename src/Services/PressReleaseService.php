<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
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
     * @param PressRelease $pressRelease
     *
     * @return mixed
     * @throws ErrorException
     */
    public function get(PressRelease $pressRelease)
    {
        if (!$pressRelease->getId()) {
            throw new ErrorException('PressRelease id required!');
        }

        return $this->callAndCast('get', "exhibitor-press-release/{$pressRelease->getId()}");
    }

    /**
     * @param PressRelease $pressRelease
     *
     * @throws ErrorException
     */
    public function delete(PressRelease $pressRelease)
    {
        if (!$pressRelease->getId()) {
            throw new ErrorException('PressRelease id required!');
        }

        $this->call('delete', "exhibitor-press-release/{$pressRelease->getId()}");
    }

    /**
     * @param PressRelease $pressRelease
     *
     * @return mixed
     * @throws ErrorException
     */
    public function save(PressRelease $pressRelease)
    {

        if ($pressRelease->getId()) {
            $verb = 'put';
            $url  = 'exhibitor-press-release/' . $pressRelease->getId();
        } else {
            $verb = 'post';
            $url  = 'exhibitor-press-release';
        }

        return $this->callAndCast($verb, $url, $pressRelease->toArray());
    }

    /**
     * @throws ErrorException
     */
    public function deleteMany()
    {
        $this->call('delete', "exhibitor-press-releases");
    }

    /**
     * @return PressRelease[]
     * @throws ErrorException
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', "exhibitor-press-releases");
    }

    /**
     * @param PressRelease[] $pressReleases
     *
     * @return PressRelease[]
     * @throws ErrorException
     */
    public function saveMany(array $pressReleases)
    {
        foreach ($pressReleases as $key => $pressRelease) {
            $pressReleases[$key] = $pressRelease->toArray();
        }

        return $this->callAndCastMany('post', "exhibitor-press-releases", ['batch' => $pressReleases]);
    }
}
