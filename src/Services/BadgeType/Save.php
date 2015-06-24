<?php namespace Buzz\Control\Services\BadgeType;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\BadgeType;

class Save implements Service
{
    /**
     * @var BadgeType
     */
    private $badgeType;

    public function __construct(BadgeType $badgeType)
    {
        if (!$badgeType->getId()) && !$badgeType->getCampaignId())) {
            throw new ErrorException('BadgeType id or Campaign id is required!');
        }

        $this->badgeType = $badgeType;
    }

    /**
     * Gets the HTTP verb of the api call
     *
     * @return mixed
     */
    public function getMethod()
    {
        return $this->badgeType->getId() ? 'put' : 'post';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "badgeType/{$this->badgeType->getId()}";
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

    public function decorate($response)
    {
        return BadgeType::createFromArray($response);
    }
}