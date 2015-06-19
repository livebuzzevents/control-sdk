<?php namespace Buzz\Control\Services\Question;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Question;

class Create implements Service
{
    /**
     * @var Question
     */
    private $question;

    /**
     * @param Question $question
     *
     * @throws ErrorException
     */
    public function __construct(Question $question)
    {
        $this->question = $question;
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
        return "question";
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return $this->question->toArray();
    }

    /**
     * @param $response
     *
     * @return static
     */
    public function decorate($response)
    {
        return Question::createFromArray($response);
    }
}