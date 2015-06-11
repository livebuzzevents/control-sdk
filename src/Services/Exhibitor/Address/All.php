<?php namespace Buzz\Control\Services\Exhibitor\Address;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Objects\Exhibitor\Address;

/**
 * Class All
 *
 * @package Buzz\Control\Services\Exhibitor\Address
 */
class All implements Service
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
        if (empty($exhibitor->getId())) {
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
        return "exhibitor/{$this->exhibitor->getId()}/address";
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

        foreach ($response as $address) {
            array_push($decorated, Address::createFromArray($address));
        }

        return $decorated;
    }
}