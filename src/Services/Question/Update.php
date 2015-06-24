<?php namespace Buzz\Control\Services\Question;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Question;

class Save implements Service
{
    /**
     * @var Question
     */
    private $question;

    public function __construct(Question $question)
    {
        if (!$question->getId()) {
            throw new ErrorException('Question id required!');
        }

        $this->question = $question;
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
        return "question/{$this->question->getId()}";
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

    public function decorate($response)
    {
        return Question::createFromArray($response);
    }
}