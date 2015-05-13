<?php namespace Buzz\Control\Services\Badge;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Badge;

class Get implements Service
{
    /**
     * @var Badge
     */
    private $badge;

    public function __construct(Badge $badge)
    {
        if (empty($badge->getId())) {
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
        return "badge/{$this->badge->getId()}";
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
        return Badge::createFromArray($response);
    }
}