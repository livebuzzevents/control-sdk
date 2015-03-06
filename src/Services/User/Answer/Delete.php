<?php namespace Buzz\Control\Services\User\Answer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\User;
use Buzz\Control\Objects\User\Answer;

class Delete implements Service
{
    /**
     * @var User
     */
    private $user;
    /**
     * @var Answer
     */
    private $answer;

    public function __construct(User $user, Answer $answer)
    {
        if (empty($user->getId())) {
            throw new ErrorException('User id required!');
        }

        if (empty($answer->getId())) {
            throw new ErrorException('Answer id required!');
        }

        $this->user   = $user;
        $this->answer = $answer;
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
        return "user/{$this->user->getId()}/answer/{$this->campaign->getId()}/{$this->answer->getId()}";
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

    public function decorate($response)
    {
        return true;
    }
}