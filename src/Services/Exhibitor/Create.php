<?php namespace Buzz\Control\Services\Exhibitor;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Campaign;
use Buzz\Control\Objects\Exhibitor;

/**
 * Class Create
 *
 * @package Buzz\Control\Services\Exhibitor
 */
class Create implements Service
{
    /**
     * @var Exhibitor
     */
    private $exhibitor;
    /**
     * @var Campaign
     */
    private $campaign;

    /**
     * @param Exhibitor $exhibitor
     * @param Campaign  $campaign
     *
     * @throws ErrorException
     */
    public function __construct(Exhibitor $exhibitor, Campaign $campaign)
    {
        if (empty($campaign->getId())) {
            throw new ErrorException('Campaign id required!');
        }

        $this->exhibitor = $exhibitor;
        $this->campaign  = $campaign;
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
        return 'exhibitor/' . $this->campaign->getId();
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return $this->exhibitor->toArray();
    }

    /**
     * @param $result
     *
     * @return static
     */
    public function decorate($result)
    {
        return Exhibitor::createFromArray($result);
    }
}