<?php namespace Buzz\Control\Services\User;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Objects\Group;
use Buzz\Control\Objects\User;

/**
 * Class Create
 *
 * @package Buzz\Control\Services\User
 */
class Create implements Service
{
    /**
     * @var User
     */
    private $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
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
        return 'user';
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