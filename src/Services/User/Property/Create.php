<?php namespace Buzz\Control\Services\User\Property;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\User;
use Buzz\Control\Objects\User\Property;

class Create implements Service
{
    /**
     * @var User
     */
    private $user;
    /**
     * @var Property
     */
    private $property;

    /**
     * @param User     $user
     * @param Property $property
     *
     * @throws ErrorException
     */
    public function __construct(User $user, Property $property)
    {
        if (empty($user->getId())) {
            throw new ErrorException('User id required!');
        }

        if (empty($property->getParameter())) {
            throw new ErrorException('Parameter required!');
        }

        $this->user     = $user;
        $this->property = $property;
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
        return "user/{$this->user->getId()}/property";
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return $this->property->toArray();
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