<?php namespace Buzz\Control\Services\Badge;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Badge;
use Buzz\Control\Services\Service;

/**
 * Class PropertyService
 *
 * @package Buzz\Control\Services\Badge
 */
class PropertyService extends Service
{
    /**
     * @var
     */
    protected static $cast = Badge\Property::class;

    /**
     * @param Badge          $badge
     * @param Badge\Property $property
     *
     * @return Badge\Property
     * @throws ErrorException
     */
    public function get(Badge $badge, Badge\Property $property)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        if (!$property->getId()) {
            throw new ErrorException('Property id required!');
        }

        return $this->callAndCast('get', "badge/{$badge->getId()}/property/{$property->getId()}");
    }

    /**
     * @param Badge          $badge
     * @param Badge\Property $property
     *
     * @throws ErrorException
     */
    public function delete(Badge $badge, Badge\Property $property)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        if (!$property->getId()) {
            throw new ErrorException('Property id required!');
        }

        $this->call('delete', "badge/{$badge->getId()}/property/{$property->getId()}");
    }

    /**
     * @param Badge          $badge
     * @param Badge\Property $property
     *
     * @return Badge\Property
     * @throws ErrorException
     */
    public function save(Badge $badge, Badge\Property $property)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        if ($property->getId()) {
            $verb = 'put';
            $url  = "badge/{$badge->getId()}/property/{$property->getId()}";
        } else {
            $verb = 'post';
            $url  = "badge/{$badge->getId()}/property";
        }

        return $this->callAndCast($verb, $url, $property->toArray());
    }

    /**
     * @param Badge $badge
     *
     * @throws ErrorException
     */
    public function deleteMany(Badge $badge)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        $this->call('delete', "badge/{$badge->getId()}/properties");
    }

    /**
     * @param Badge $badge
     *
     * @return Badge\Property[]
     * @throws ErrorException
     */
    public function getMany(Badge $badge)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        return $this->callAndCastMany('get', "badge/{$badge->getId()}/properties");
    }

    /**
     * @param Badge            $badge
     * @param Badge\Property[] $properties
     *
     * @return Badge\Property[]
     * @throws ErrorException
     */
    public function saveMany(Badge $badge, array $properties)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        foreach ($properties as $key => $property) {
            $properties[$key] = $property->toArray();
        }

        return $this->callAndCastMany('post', "badge/{$badge->getId()}/properties", ['batch' => $properties]);
    }
}