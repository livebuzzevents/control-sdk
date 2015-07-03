<?php namespace Buzz\Control\Services\Badge\Property;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Badge;
use Buzz\Control\Objects\Badge\Property;
use Buzz\Control\Objects\Parameter;

class Save implements Service
{
    /**
     * @var Badge
     */
    private $badge;
    /**
     * @var Property
     */
    private $property;

    public function __construct(Badge $badge, Property $property)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        $this->badge    = $badge;
        $this->property = $property;
    }

    /**
     * Gets the HTTP verb of the api call
     *
     * @return mixed
     */
    public function getMethod()
    {
        return $this->property->getId() ? 'put' : 'post';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "badge/{$this->badge->getId()}/property" . ($this->property->getId() ? "/{$this->property->getId()}" : '');
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return $this->property->toArray();
    }

    /**
     * @param $result
     *
     * @return static
     */
    public function decorate($result)
    {
        $result['parameter'] = Parameter::createFromArray($result['parameter']);

        return Property::createFromArray($result);
    }
}