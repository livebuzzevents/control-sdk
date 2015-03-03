<?php namespace Buzz\Control\Services\User\Phone;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\User;
use Buzz\Control\Objects\User\Phone;

class Create implements Service
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
        return 'post';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "user/{$this->user->getId()}/phone";
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
}