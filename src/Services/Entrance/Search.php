<?php namespace Buzz\Control\Services\Entrance;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\Entrance;
use Buzz\Control\Filter;

/**
 * Class Search
 *
 * @package Buzz\Control\Services\Customer\Address
 */
class Search implements Service
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
        return "entrance";
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

        foreach ($response as $key => $entrance) {
            $decorated[$key] = Entrance::createFromArray($entrance);
        }

        return $decorated;
    }
}