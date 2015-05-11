<?php namespace Buzz\Control\Services\BadgeType;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\BadgeType;
use Buzz\Control\Objects\Campaign;

/**
 * Class Create
 *
 * @package Buzz\Control\Services\BadgeType
 */
class Create implements Service
{
    /**
     * @var BadgeType
     */
    private $badgeType;

    /**
     * @var
     */
    private $campaign;

    /**
     * @param Campaign  $campaign
     * @param BadgeType $badgeType
     *
     * @throws ErrorException
     */
    public function __construct(Campaign $campaign, BadgeType $badgeType)
    {
        if (empty($campaign->getId())) {
            throw new ErrorException('Campaign id required!');
        }

        $this->badgeType = $badgeType;
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
        return 'badgeType/' . $this->campaign->getId();
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return $this->badgeType->toArray();
    }

    /**
     * @param $response
     *
     * @return static
     */
    public function decorate($response)
    {
        return BadgeType::createFromArray($response);
    }
}