<?php namespace Buzz\Control\Services\BadgeType;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\BadgeType;

class Delete implements Service
{
    /**
     * @var BadgeType
     */
    private $badgeType;

    public function __construct(BadgeType $badgeType)
    {
        if (empty($badgeType->getId())) {
            throw new ErrorException('BadgeType id required!');
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
        return 'delete';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "badge-type/{$this->badgeType->getId()}";
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return [];
    }

    public function decorate($response)
    {
        return true;
    }
}