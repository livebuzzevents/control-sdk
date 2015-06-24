<?php namespace Buzz\Control\Services\Exhibitor;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;

class Save implements Service
{
    /**
     * @var Exhibitor
     */
    private $exhibitor;

    public function __construct(Exhibitor $exhibitor)
    {
        if (!$exhibitor->getId()) && !$exhibitor->getCampaignId())) {
            throw new ErrorException('Exhibitor id or Campaign id is required!');
        }

        $this->exhibitor = $exhibitor;
    }

    /**
     * Gets the HTTP verb of the api call
     *
     * @return mixed
     */
    public function getMethod()
    {
        return $this->exhibitor->getId() ? 'put' : 'post';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "exhibitor/{$this->exhibitor->getId()}";
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