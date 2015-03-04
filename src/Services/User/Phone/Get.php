<?php namespace Buzz\Control\Services\User\Phone;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\User;
use Buzz\Control\Objects\User\Phone;

class Get implements Service
{
    /**
     * @var User
     */
    private $user;
    /**
     * @var Phone
     */
    private $phone;

    public function __construct(User $user, Phone $phone)
    {
        if (empty($user->getId())) {
            throw new ErrorException('User id required!');
        }

        if (empty($phone->getId())) {
            throw new ErrorException('Phone id required!');
        }

        $this->user  = $user;
        $this->phone = $phone;
    }

    /**
     * Gets the HTTP verb of the api call
     *
     * @return mixed
     */
    public function getMethod()
    {
        return 'get';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "user/{$this->user->getId()}/phone/{$this->phone->getId()}";
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