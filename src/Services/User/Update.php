<?php namespace Buzz\Control\Services\User;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\User;
use Buzz\Control\Objects\Group;

class Update implements Service
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
        return 'put';
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
        $user = $this->user->toArray();

        if (!empty($user['group']) && !empty($user['group']['id'])) {
            $user['group_id'] = $user['group']['id'];
        }

        return [
            'user' => $this->user->toArray()
        ];
    }

    /**
     * @param $result
     *
     * @return static
     */
    public function decorate($result)
    {
        $result['group'] = Group::createFromArray($result['group']);

        return User::createFromArray($result);
    }
}