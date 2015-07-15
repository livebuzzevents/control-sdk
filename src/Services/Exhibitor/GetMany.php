<?php

namespace Buzz\Control\Services\Exhibitor;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Filter;
use Buzz\Control\Objects\Exhibitor;

/**
 * Class GetMany
 *
 * @package Buzz\Control\Services\Exhibitor\Address
 */
class GetMany implements Service
{
    /**
     * @var
     */
    protected $filter;

    /**
     * @param Filter $filter
     */
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
        return 'get';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "exhibitors";
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

    /**
     * @param $response
     *
     * @return array
     */
    public function decorate($response)
    {
        $decorated = [];

        foreach ($response as $key => $exhibitor) {
            $decorated[$key] = Exhibitor::createFromArray($exhibitor);
        }

        return $decorated;
    }
}