<?php namespace Buzz\Control\Services\User\Property;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\User;
use Buzz\Control\Objects\User\Property;

/**
 * Class All
 *
 * @package Buzz\Control\Services\User\Property
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
        return "user/{$this->user->getId()}/property";
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

        foreach ($response as $property) {
            array_push($decorated, Property::createFromArray($property));
        }

        return $decorated;
    }
}