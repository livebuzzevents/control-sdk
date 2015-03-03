<?php namespace Buzz\Control\Services\User;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\User;

class Delete implements Service
{
    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {
        if (empty($user->getId())) {
            throw new ErrorException('User id required!');
        }

        $this->user = $user;
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
        return "user/{$this->user->getId()}";
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
}