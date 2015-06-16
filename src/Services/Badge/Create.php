<?php namespace Buzz\Control\Services\Badge;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Badge;
use Buzz\Control\Objects\Campaign;

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
     * @var
     */
    private $campaign;

    /**
     * @param Campaign $campaign
     * @param Badge    $badge
     *
     * @throws ErrorException
     */
    public function __construct(Campaign $campaign, Badge $badge)
    {
        if (empty($campaign->getId())) {
            throw new ErrorException('Campaign id required!');
        }

        $this->badge    = $badge;
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
        return 'badge/' . $this->campaign->getId();
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