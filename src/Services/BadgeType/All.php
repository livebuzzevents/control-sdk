<?php namespace Buzz\Control\Services\BadgeType;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Objects\BadgeType;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\Filter;

/**
 * Class All
 *
 * @package Buzz\Control\Services\Customer\Address
 */
class All implements Service
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
        return "badgeType";
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

        foreach ($response as $badgeType) {
            $decorated[] = BadgeType::createFromArray($badgeType);
        }

        return $decorated;
    }
}