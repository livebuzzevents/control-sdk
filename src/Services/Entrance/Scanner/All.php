<?php namespace Buzz\Control\Services\Entrance\Scanner;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Entrance;
use Buzz\Control\Objects\Entrance\Scanner;

/**
 * Class All
 *
 * @package Buzz\Control\Services\Entrance\Scanner
 */
class All implements Service
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
        if (empty($entrance->getId())) {
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
        return "entrance/{$this->entrance->getId()}/scanner";
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

        foreach ($response as $scanner) {
            array_push($decorated, Scanner::createFromArray($scanner));
        }

        return $decorated;
    }
}