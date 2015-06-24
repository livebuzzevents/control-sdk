<?php namespace Buzz\Control\Services\Entrance;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Entrance;

class Get implements Service
{
    /**
     * @var Entrance
     */
    private $entrance;

    public function __construct(Entrance $entrance)
    {
        if (!$entrance->getId()) {
            throw new ErrorException('Entrance id required!');
        }

        $this->entrance = $entrance;
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
        return "entrance/{$this->entrance->getId()}";
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

    public function decorate($response)
    {
        return Entrance::createFromArray($response);
    }
}