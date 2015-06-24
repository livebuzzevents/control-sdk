<?php namespace Buzz\Control\Services\Entrance;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Entrance;

class Save implements Service
{
    /**
     * @var Entrance
     */
    private $entrance;

    public function __construct(Entrance $entrance)
    {
        if (!$entrance->getId()) && !$entrance->getCampaignId())) {
            throw new ErrorException('Entrance id or Campaign id is required!');
        }

        $this->entrance = $entrance;
    }

    /**
     * Gets the HTTP verb of the api call
     *
     * @return mixed
     */
    public function getMethod()
    {
        return $this->entrance->getId() ? 'put' : 'post';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "entrance/{$this->entrance->getId()}";
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

    public function decorate($response)
    {
        return Entrance::createFromArray($response);
    }
}