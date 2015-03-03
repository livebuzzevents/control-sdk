<?php namespace Buzz\Control\Services\User\Job;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\User;
use Buzz\Control\Objects\User\Job;

class Get implements Service
{
    /**
     * @var User
     */
    private $user;
    /**
     * @var Job
     */
    private $job;

    public function __construct(User $user, Job $job)
    {
        if (empty($user->getId())) {
            throw new ErrorException('User id required!');
        }

        if (empty($job->getId())) {
            throw new ErrorException('Job id required!');
        }

        $this->user = $user;
        $this->job  = $job;
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
        return "user/{$this->user->getId()}/job/{$this->job->getId()}";
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