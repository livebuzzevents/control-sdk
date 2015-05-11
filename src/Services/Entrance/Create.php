<?php namespace Buzz\Control\Services\Entrance;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Campaign;
use Buzz\Control\Objects\Entrance;

/**
 * Class Create
 *
 * @package Buzz\Control\Services\Entrance
 */
class Create implements Service
{
    /**
     * @var Entrance
     */
    private $entrance;

    /**
     * @var
     */
    private $campaign;

    /**
     * @param Campaign $campaign
     * @param Entrance $entrance
     *
     * @throws ErrorException
     */
    public function __construct(Campaign $campaign, Entrance $entrance)
    {
        if (empty($campaign->getId())) {
            throw new ErrorException('Campaign id required!');
        }

        $this->entrance = $entrance;
        $this->campaign = $campaign;
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
        return 'entrance/' . $this->campaign->getId();
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return $this->entrance->toArray();
    }

    /**
     * @param $response
     *
     * @return static
     */
    public function decorate($response)
    {
        return Entrance::createFromArray($response);
    }
}