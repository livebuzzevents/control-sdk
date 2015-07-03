<?php namespace Buzz\Control\Services\Badge\Answer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Badge;

class Delete implements Service
{
    /**
     * @var Badge
     */
    private $badge;

    /**
     * @var Badge\Answer
     */
    private $answer;

    public function __construct(Badge $badge, Badge\Answer $answer)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        if (!$answer->getId()) {
            throw new ErrorException('Question id required!');
        }

        $this->badge  = $badge;
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
        return "badge/{$this->badge->getId()}/answer/{$this->answer->getId()}";
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return $this->answer->toArray();
    }

    public function decorate($response)
    {
        return true;
    }
}