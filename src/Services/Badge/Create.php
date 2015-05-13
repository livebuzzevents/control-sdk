<?php namespace Buzz\Control\Services\Badge;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Badge;

/**
 * Class Create
 *
 * @package Buzz\Control\Services\Badge
 */
class Create implements Service
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
        $this->badge = $badge;
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
        return 'badge';
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return $this->badge->toArray();
    }

    /**
     * @param $response
     *
     * @return static
     */
    public function decorate($response)
    {
        return Badge::createFromArray($response);
    }
}