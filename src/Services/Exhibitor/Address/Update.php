<?php namespace Buzz\Control\Services\Exhibitor\Address;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Objects\Exhibitor\Address;

class Save implements Service
{
    /**
     * @var Exhibitor
     */
    private $exhibitor;
    /**
     * @var Address
     */
    private $address;

    public function __construct(Exhibitor $exhibitor, Address $address)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        $this->exhibitor = $exhibitor;
        $this->address   = $address;
    }

    /**
     * Gets the HTTP verb of the api call
     *
     * @return mixed
     */
    public function getMethod()
    {
        return $this->address->getId() ? 'put' : 'post';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "exhibitor/{$this->exhibitor->getId()}/address" . ($this->address->getId() ? "/{$this->address->getId()}" : '');
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return $this->address->toArray();
    }

    public function decorate($response)
    {
        return Address::createFromArray($response);
    }
}