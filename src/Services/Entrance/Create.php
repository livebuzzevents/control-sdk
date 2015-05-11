<?php namespace Buzz\Control\Services\Entrance;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Entrance;

class Create implements Service
{
    /**
     * @var Entrance
     */
    private $entrance;

    /**
     * @param Entrance $entrance
     *
     * @throws ErrorException
     */
    public function __construct(Entrance $entrance)
    {
        $this->entrance = $entrance;
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
        return "entrance";
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return $this->entrance->toArray();
    }

    /**
     * @param $response
     *
     * @return static
     */
    public function decorate($response)
    {
        return Entrance::createFromArray($response);
    }
}