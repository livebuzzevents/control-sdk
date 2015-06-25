<?php namespace Buzz\Control\Services\Exhibitor\Social;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Objects\Exhibitor\Social;

class Save implements Service
{
    /**
     * @var Exhibitor
     */
    private $exhibitor;
    /**
     * @var Social
     */
    private $social;

    public function __construct(Exhibitor $exhibitor, Social $social)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        $this->exhibitor = $exhibitor;
        $this->social    = $social;
    }

    /**
     * Gets the HTTP verb of the api call
     *
     * @return mixed
     */
    public function getMethod()
    {
        return $this->social->getId() ? 'put' : 'post';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "exhibitor/{$this->exhibitor->getId()}/social" . ($this->social->getId() ? "/{$this->social->getId()}" : '');
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return $this->social->toArray();
    }

    /**
     * @param $result
     *
     * @return static
     */
    public function decorate($result)
    {
        return Social::createFromArray($result);
    }
}