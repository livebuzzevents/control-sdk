<?php namespace Buzz\Control\Services\Question;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Objects\Question;

class Save implements Service
{
    /**
     * @var Question
     */
    private $question;

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
        return $this->question->getId() ? 'put' : 'post';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "question" . ($this->question->getId() ? "/{$this->question->getId()}" : '');
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