<?php namespace Buzz\Control\Services\Badge\Answer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Badge;

/**
 * Class Save
 *
 * @package Buzz\Control\Services\Badge\Answer
 */
class Save implements Service
{
    /**
     * @var Badge
     */
    private $badge;
    /**
     * @var Badge\Answer
     */
    private $answer;

    /**
     * @param Badge        $badge
     * @param Badge\Answer $answer
     *
     * @throws ErrorException
     */
    public function __construct(Badge $badge, Badge\Answer $answer)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        if (!$answer->getId() && !$answer->getQuestionId() && !$answer->getQuestion()) {
            throw new ErrorException('Answer id or Question id required!');
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
        return 'post';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "badge/{$this->badge->getId()}/answer";
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

    /**
     * @param $response
     *
     * @return mixed
     */
    public function decorate($response)
    {
        return Badge\Answer::createFromArray($response);
    }
}