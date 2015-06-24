<?php namespace Buzz\Control\Services\Exhibitor\Phone;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Objects\Exhibitor\Phone;

class Save implements Service
{
    /**
     * @var Exhibitor
     */
    private $exhibitor;
    /**
     * @var Phone
     */
    private $phone;

    public function __construct(Exhibitor $exhibitor, Phone $phone)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        $this->exhibitor = $exhibitor;
        $this->phone     = $phone;
    }

    /**
     * Gets the HTTP verb of the api call
     *
     * @return mixed
     */
    public function getMethod()
    {
        return $this->phone->getId() ? 'put' : 'post';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "exhibitor/{$this->exhibitor->getId()}/phone/{$this->phone->getId()}";
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return $this->phone->toArray();
    }

    /**
     * @param $result
     *
     * @return static
     */
    public function decorate($result)
    {
        return Phone::createFromArray($result);
    }
}