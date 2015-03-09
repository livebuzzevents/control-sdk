<?php namespace Buzz\Control\Services\User\Parameter;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\User;
use Buzz\Control\Objects\User\Parameter;

class Delete implements Service
{
    /**
     * @var User
     */
    private $user;
    /**
     * @var Parameter
     */
    private $parameter;

    public function __construct(User $user, Parameter $parameter)
    {
        if (empty($user->getId())) {
            throw new ErrorException('User id required!');
        }

        if (empty($parameter->getId())) {
            throw new ErrorException('Parameter id required!');
        }

        $this->user  = $user;
        $this->parameter = $parameter;
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
        return "user/{$this->user->getId()}/parameter/{$this->parameter->getId()}";
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
        return true;
    }
}