<?php namespace Buzz\Control\Services\Badge\Answer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Filter;
use Buzz\Control\Objects\Badge;

class DeleteMany implements Service
{
    /**
     * @var Badge
     */
    private $badge;

    /**
     * @var Filter
     */
    private $filter;

    public function __construct(Badge $badge, Filter $filter = null)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        $this->badge  = $badge;
        $this->filter = $filter;
    }

    /**
     * Gets the HTTP verb of the api call
     *
     * @return mixed
     */
    public function getMethod()
    {
        return 'delete';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "badge/{$this->badge->getId()}/answers";
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return $this->filter ? ['filters' => $this->filter->getFilters()] : [];
    }

    public function decorate($response)
    {
        return true;
    }
}