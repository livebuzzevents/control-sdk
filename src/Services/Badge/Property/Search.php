<?php namespace Buzz\Control\Services\Badge\Property;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Badge;
use Buzz\Control\Objects\Badge\Property;

/**
 * Class Search
 *
 * @package Buzz\Control\Services\Badge\Property
 */
class Search implements Service
{
    /**
     * @var Badge
     */
    private $badge;

    /**
     * @param Badge $badge
     *
     * @throws ErrorException
     */
    public function __construct(Badge $badge)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        $this->badge = $badge;
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
        return "badge/{$this->badge->getId()}/property";
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