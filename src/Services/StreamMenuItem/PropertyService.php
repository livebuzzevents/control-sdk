<?php namespace Buzz\Control\Services\StreamMenuItem;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\StreamMenuItem;
use Buzz\Control\Services\Service;

/**
 * Class PropertyService
 *
 * @package Buzz\Control\Services\StreamMenuItem
 */
class PropertyService extends Service
{
    /**
     * @var
     */
    protected static $cast = StreamMenuItem\Property::class;

    /**
     * @param StreamMenuItem          $streamMenuItem
     * @param StreamMenuItem\Property $property
     *
     * @return StreamMenuItem\Property
     * @throws ErrorException
     */
    public function get(StreamMenuItem $streamMenuItem, StreamMenuItem\Property $property)
    {
        if (!$streamMenuItem->getId()) {
            throw new ErrorException('StreamMenuItem id required!');
        }

        if (!$property->getId()) {
            throw new ErrorException('Property id required!');
        }

        return $this->callAndCast('get', "stream-menu-item/{$streamMenuItem->getId()}/property/{$property->getId()}");
    }

    /**
     * @param StreamMenuItem          $streamMenuItem
     * @param StreamMenuItem\Property $property
     *
     * @throws ErrorException
     */
    public function delete(StreamMenuItem $streamMenuItem, StreamMenuItem\Property $property)
    {
        if (!$streamMenuItem->getId()) {
            throw new ErrorException('StreamMenuItem id required!');
        }

        if (!$property->getId()) {
            throw new ErrorException('Property id required!');
        }

        $this->call('delete', "stream-menu-item/{$streamMenuItem->getId()}/property/{$property->getId()}");
    }

    /**
     * @param StreamMenuItem          $streamMenuItem
     * @param StreamMenuItem\Property $property
     *
     * @return StreamMenuItem\Property
     * @throws ErrorException
     */
    public function save(StreamMenuItem $streamMenuItem, StreamMenuItem\Property $property)
    {
        if (!$streamMenuItem->getId()) {
            throw new ErrorException('StreamMenuItem id required!');
        }

        if ($property->getId()) {
            $verb = 'put';
            $url  = "stream-menu-item/{$streamMenuItem->getId()}/property/{$property->getId()}";
        } else {
            $verb = 'post';
            $url  = "stream-menu-item/{$streamMenuItem->getId()}/property";
        }

        return $this->callAndCast($verb, $url, $property->toArray());
    }

    /**
     * @param StreamMenuItem $streamMenuItem
     *
     * @throws ErrorException
     */
    public function deleteMany(StreamMenuItem $streamMenuItem)
    {
        if (!$streamMenuItem->getId()) {
            throw new ErrorException('StreamMenuItem id required!');
        }

        $this->call('delete', "stream-menu-item/{$streamMenuItem->getId()}/properties");
    }

    /**
     * @param StreamMenuItem $streamMenuItem
     *
     * @return StreamMenuItem\Property[]
     * @throws ErrorException
     */
    public function getMany(StreamMenuItem $streamMenuItem)
    {
        if (!$streamMenuItem->getId()) {
            throw new ErrorException('StreamMenuItem id required!');
        }

        return $this->callAndCastMany('get', "stream-menu-item/{$streamMenuItem->getId()}/properties");
    }

    /**
     * @param StreamMenuItem            $streamMenuItem
     * @param StreamMenuItem\Property[] $properties
     *
     * @return StreamMenuItem\Property[]
     * @throws ErrorException
     */
    public function saveMany(StreamMenuItem $streamMenuItem, array $properties)
    {
        if (!$streamMenuItem->getId()) {
            throw new ErrorException('StreamMenuItem id required!');
        }

        foreach ($properties as $key => $property) {
            $properties[$key] = $property->toArray();
        }

        return $this->callAndCastMany('post', "stream-menu-item/{$streamMenuItem->getId()}/properties", ['batch' => $properties]);
    }
}