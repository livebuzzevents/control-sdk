<?php namespace Buzz\Control\Services\User\Parameter;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\User;
use Buzz\Control\Objects\User\Parameter;

/**
 * Class All
 *
 * @package Buzz\Control\Services\User\Parameter
 */
class All implements Service
{
    /**
     * @var User
     */
    private $user;

    /**
     * @param User $user
     *
     * @throws ErrorException
     */
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
        return 'get';
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
        return [];
    }

    /**
     * @param $response
     *
     * @return array
     */
    public function decorate($response)
    {
        $decorated = [];

        foreach ($response as $parameter) {
            array_push($decorated, Parameter::createFromArray($parameter));
        }

        return $decorated;
    }
}