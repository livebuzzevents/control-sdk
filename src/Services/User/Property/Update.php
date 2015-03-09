<?php namespace Buzz\Control\Services\User\Property;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\User;
use Buzz\Control\Objects\User\Property;

class Update implements Service
{
    /**
     * @var User
     */
    private $user;
    /**
     * @var Property
     */
    private $property;

    public function __construct(User $user, Property $property)
    {
        if (empty($user->getId())) {
            throw new ErrorException('User id required!');
        }

        if (empty($property->getId())) {
            throw new ErrorException('Property id required!');
        }

        $this->user  = $user;
        $this->property = $property;
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
        return "user/{$this->user->getId()}/property/{$this->property->getId()}";
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
        return Property::createFromArray($result);
    }
}