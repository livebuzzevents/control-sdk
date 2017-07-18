<?php namespace Buzz\Control\Services\Exhibitor;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Services\Service;

/**
 * Class PropertyService
 *
 * @package Buzz\Control\Services\Exhibitor
 */
class PropertyService extends Service
{
    /**
     * @var
     */
    protected static $cast = Exhibitor\Property::class;

    /**
     * @param Exhibitor $exhibitor
     * @param Exhibitor\Property $property
     *
     * @return Exhibitor\Property
     * @throws ErrorException
     */
    public function get(Exhibitor $exhibitor, Exhibitor\Property $property)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        if (!$property->getId()) {
            throw new ErrorException('Property id required!');
        }

        return $this->callAndCast('get', "exhibitor/{$exhibitor->getId()}/property/{$property->getId()}");
    }

    /**
     * @param Exhibitor $exhibitor
     * @param Exhibitor\Property $property
     *
     * @throws ErrorException
     */
    public function delete(Exhibitor $exhibitor, Exhibitor\Property $property)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        if (!$property->getId()) {
            throw new ErrorException('Property id required!');
        }

        $this->call('delete', "exhibitor/{$exhibitor->getId()}/property/{$property->getId()}");
    }

    /**
     * @param Exhibitor $exhibitor
     * @param Exhibitor\Property $property
     *
     * @return Exhibitor\Property
     * @throws ErrorException
     */
    public function save(Exhibitor $exhibitor, Exhibitor\Property $property)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        if ($property->getId()) {
            $verb = 'put';
            $url  = "exhibitor/{$exhibitor->getId()}/property/{$property->getId()}";
        } else {
            $verb = 'post';
            $url  = "exhibitor/{$exhibitor->getId()}/property";
        }

        return $this->callAndCast($verb, $url, $property->toArray());
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

        $this->call('delete', "exhibitor/{$exhibitor->getId()}/properties");
    }

    /**
     * @param Exhibitor $exhibitor
     *
     * @return Exhibitor\Property[]
     * @throws ErrorException
     */
    public function getMany(Exhibitor $exhibitor)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        return $this->callAndCastMany('get', "exhibitor/{$exhibitor->getId()}/properties");
    }

    /**
     * @param Exhibitor $exhibitor
     * @param Exhibitor\Property[] $properties
     *
     * @return Exhibitor\Property[]
     * @throws ErrorException
     */
    public function saveMany(Exhibitor $exhibitor, array $properties)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        foreach ($properties as $key => $property) {
            $properties[$key] = $property->toArray();
        }

        return $this->callAndCastMany('post', "exhibitor/{$exhibitor->getId()}/properties", ['batch' => $properties]);
    }
}
