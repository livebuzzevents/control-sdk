<?php namespace Buzz\Control\Services\User\Address;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\User;
use Buzz\Control\Objects\User\Address;

class Update implements Service
{
    /**
     * @var User
     */
    private $user;
    /**
     * @var Address
     */
    private $address;

    public function __construct(User $user, Address $address)
    {
        if (empty($user->getId())) {
            throw new ErrorException('User id required!');
        }

        if (empty($address->getId())) {
            throw new ErrorException('Address id required!');
        }

        $this->user    = $user;
        $this->address = $address;
    }

    /**
     * Gets the HTTP verb of the api call
     *
     * @return mixed
     */
    public function getMethod()
    {
        return 'put';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "user/{$this->user->getId()}/address/{$this->address->getId()}";
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
        return Address::createFromArray($response);
    }
}