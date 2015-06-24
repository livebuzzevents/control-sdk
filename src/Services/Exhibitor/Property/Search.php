<?php namespace Buzz\Control\Services\Exhibitor\Property;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Objects\Exhibitor\Property;
use Buzz\Control\Objects\Parameter;

/**
 * Class Search
 *
 * @package Buzz\Control\Services\Exhibitor\Property
 */
class Search implements Service
{
    /**
     * @var Exhibitor
     */
    private $exhibitor;

    /**
     * @param Exhibitor $exhibitor
     *
     * @throws ErrorException
     */
    public function __construct(Exhibitor $exhibitor)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        $this->exhibitor = $exhibitor;
    }

    /**
     * Gets the HTTP verb of the api call
     *
     * @return mixed
     */
    public function getMethod()
    {
        return 'get';
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
        return [];
    }

    /**
     * @param $response
     *
     * @return array
     */
    public function decorate($response)
    {
        $decorated = [];

        foreach ($response as $key => $property) {
            $decorated[$key] = Property::createFromArray($property);
        }

        return $decorated;
    }
}