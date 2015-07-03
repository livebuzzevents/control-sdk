<?php namespace Buzz\Control\Services\Badge\Answer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Badge;
use Buzz\Control\Objects\Question;

/**
 * Class Get
 *
 * @package Buzz\Control\Services\Badge\Answer
 */
class Get implements Service
{
    /**
     * @var Badge
     */
    private $badge;

    /**
     * @var Answer
     */
    private $question;

    /**
     * @param Badge    $badge
     * @param Question $question
     *
     * @throws ErrorException
     */
    public function __construct(Badge $badge, Question $question)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        if (!$question->getId()) {
            throw new ErrorException('Question id required!');
        }

        $this->badge    = $badge;
        $this->question = $question;
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
        return "badge/{$this->badge->getId()}/answer/{$this->question->getId()}";
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
     * @return mixed
     */
    public function decorate($response)
    {
        return Badge\Answer::createFromArray($response);
    }
}