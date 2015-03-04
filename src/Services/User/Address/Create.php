<?php namespace Buzz\Control\Services\User\Address;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\User;
use Buzz\Control\Objects\User\Address;

class Create implements Service
{
    /**
     * @var User
     */
    private $user;
    /**
     * @var Address
     */
    private $address;

    /**
     * @param User    $user
     * @param Address $address
     *
     * @throws ErrorException
     */
    public function __construct(User $user, Address $address)
    {
        if (empty($user->getId())) {
            throw new ErrorException('User id required!');
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
        return 'post';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "user/{$this->user->getId()}/address";
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

    /**
     * @param $response
     *
     * @return static
     */
    public function decorate($response)
    {
        return Address::createFromArray($response);
    }
}