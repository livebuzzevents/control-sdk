<?php namespace Buzz\Control\Services\Lead;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Lead;
use Buzz\Control\Services\Service;

/**
 * Class PropertyService
 *
 * @package Buzz\Control\Services\Lead
 */
class PropertyService extends Service
{
    /**
     * @var
     */
    protected static $cast = Lead\Property::class;

    /**
     * @param Lead $lead
     * @param Lead\Property $property
     *
     * @return Lead\Property
     * @throws ErrorException
     */
    public function get(Lead $lead, Lead\Property $property)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        if (!$property->getId()) {
            throw new ErrorException('Property id required!');
        }

        return $this->callAndCast('get', "lead/{$lead->getId()}/property/{$property->getId()}");
    }

    /**
     * @param Lead $lead
     * @param Lead\Property $property
     *
     * @throws ErrorException
     */
    public function delete(Lead $lead, Lead\Property $property)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        if (!$property->getId()) {
            throw new ErrorException('Property id required!');
        }

        $this->call('delete', "lead/{$lead->getId()}/property/{$property->getId()}");
    }

    /**
     * @param Lead $lead
     * @param Lead\Property $property
     *
     * @return Lead\Property
     * @throws ErrorException
     */
    public function save(Lead $lead, Lead\Property $property)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        if ($property->getId()) {
            $verb = 'put';
            $url  = "lead/{$lead->getId()}/property/{$property->getId()}";
        } else {
            $verb = 'post';
            $url  = "lead/{$lead->getId()}/property";
        }

        return $this->callAndCast($verb, $url, $property->toArray());
    }

    /**
     * @param Lead $lead
     *
     * @throws ErrorException
     */
    public function deleteMany(Lead $lead)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        $this->call('delete', "lead/{$lead->getId()}/properties");
    }

    /**
     * @param Lead $lead
     *
     * @return Lead\Property[]
     * @throws ErrorException
     */
    public function getMany(Lead $lead)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        return $this->callAndCastMany('get', "lead/{$lead->getId()}/properties");
    }

    /**
     * @param Lead $lead
     * @param Lead\Property[] $properties
     *
     * @return Lead\Property[]
     * @throws ErrorException
     */
    public function saveMany(Lead $lead, array $properties)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        foreach ($properties as $key => $property) {
            $properties[$key] = $property->toArray();
        }

        return $this->callAndCastMany('post', "lead/{$lead->getId()}/properties", ['batch' => $properties]);
    }
}
