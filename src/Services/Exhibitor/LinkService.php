<?php namespace Buzz\Control\Services\Exhibitor;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Objects\Link;
use Buzz\Control\Services\Service;

/**
 * Class LinkService
 *
 * @package Buzz\Control\Services\Exhibitor
 */
class LinkService extends Service
{
    /**
     * @var
     */
    protected static $cast = Link::class;

    /**
     * @param Exhibitor $exhibitor
     * @param Link $link
     *
     * @return Link
     * @throws ErrorException
     */
    public function get(Exhibitor $exhibitor, Link $link)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        if (!$link->getId()) {
            throw new ErrorException('Link id required!');
        }

        return $this->callAndCast('get', "exhibitor/{$exhibitor->getId()}/link/{$link->getId()}");
    }

    /**
     * @param Exhibitor $exhibitor
     * @param Link $link
     *
     * @throws ErrorException
     */
    public function delete(Exhibitor $exhibitor, Link $link)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        if (!$link->getId()) {
            throw new ErrorException('Link id required!');
        }

        $this->call('delete', "exhibitor/{$exhibitor->getId()}/link/{$link->getId()}");
    }

    /**
     * @param Exhibitor $exhibitor
     * @param Link $link
     *
     * @return Link
     * @throws ErrorException
     */
    public function save(Exhibitor $exhibitor, Link $link)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        if ($link->getId()) {
            $verb = 'put';
            $url  = "exhibitor/{$exhibitor->getId()}/link/{$link->getId()}";
        } else {
            $verb = 'post';
            $url  = "exhibitor/{$exhibitor->getId()}/link";
        }

        return $this->callAndCast($verb, $url, $link->toArray());
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

        $this->call('delete', "exhibitor/{$exhibitor->getId()}/links");
    }

    /**
     * @param Exhibitor $exhibitor
     *
     * @return Link[]
     * @throws ErrorException
     */
    public function getMany(Exhibitor $exhibitor)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        return $this->callAndCastMany('get', "exhibitor/{$exhibitor->getId()}/links");
    }

    /**
     * @param Exhibitor $exhibitor
     * @param Link[] $links
     *
     * @return Link[]
     * @throws ErrorException
     */
    public function saveMany(Exhibitor $exhibitor, array $links)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        foreach ($links as $key => $link) {
            $links[$key] = $link->toArray();
        }

        return $this->callAndCastMany('post', "exhibitor/{$exhibitor->getId()}/links", ['batch' => $links]);
    }
}
