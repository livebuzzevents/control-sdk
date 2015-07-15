<?php namespace Buzz\Control\Services\Exhibitor;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Filter;

class DeleteMany implements Service
{
    /**
     * @var Filter
     */
    private $filter;

    public function __construct(Filter $filter = null)
    {
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
        return "badges";
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