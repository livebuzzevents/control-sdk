<?php namespace Buzz\Control\Services\User\Parameter;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\User;
use Buzz\Control\Objects\User\Parameter;

class Create implements Service
{
    /**
     * @var User
     */
    private $user;
    /**
     * @var Parameter
     */
    private $user_parameter;

    /**
     * @param User      $user
     * @param Parameter $user_parameter
     *
     * @throws ErrorException
     */
    public function __construct(User $user, Parameter $user_parameter)
    {
        if (empty($user->getId())) {
            throw new ErrorException('User id required!');
        }

        if (empty($user_parameter->getParameter())) {
            throw new ErrorException('Parameter required!');
        }

        $this->user           = $user;
        $this->user_parameter = $user_parameter;
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
        return "user/{$this->user->getId()}/parameter";
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return $this->user_parameter->toArray();
    }

    /**
     * @param $result
     *
     * @return static
     */
    public function decorate($result)
    {
        return Parameter::createFromArray($result);
    }
}