<?php namespace Buzz\Control\Services\Exhibitor\Property;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Objects\Exhibitor\Property;
use Buzz\Control\Objects\Parameter;

class Create implements Service
{
    /**
     * @var Exhibitor
     */
    private $exhibitor;
    /**
     * @var Property
     */
    private $property;

    /**
     * @param Exhibitor $exhibitor
     * @param Property  $property
     *
     * @throws ErrorException
     */
    public function __construct(Exhibitor $exhibitor, Property $property)
    {
        if (empty($exhibitor->getId())) {
            throw new ErrorException('Exhibitor id required!');
        }

        if (empty($property->getParameter())) {
            throw new ErrorException('Parameter required!');
        }

        $this->exhibitor = $exhibitor;
        $this->property  = $property;
    }

    /**
     * Gets the HTTP verb of the api call
     *
     * @return mixed
     */
    public function getMethod()
    {
        return 'post';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "exhibitor/{$this->exhibitor->getId()}/property";
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