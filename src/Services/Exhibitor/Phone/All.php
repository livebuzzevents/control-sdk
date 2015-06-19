<?php namespace Buzz\Control\Services\Exhibitor\Phone;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Objects\Exhibitor\Phone;

/**
 * Class All
 *
 * @package Buzz\Control\Services\Exhibitor\Phone
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
        return "exhibitor/{$this->exhibitor->getId()}/phone";
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

        foreach ($response as $phone) {
            $decorated[] = Phone::createFromArray($phone);
        }

        return $decorated;
    }
}