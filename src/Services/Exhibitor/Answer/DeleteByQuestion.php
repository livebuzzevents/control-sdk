<?php namespace Buzz\Control\Services\Exhibitor\Answer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Objects\Exhibitor\Answer;
use Buzz\Control\Objects\Question;

class DeleteByQuestion implements Service
{
    /**
     * @var Exhibitor
     */
    private $exhibitor;
    /**
     * @var Question
     */
    private $question;

    public function __construct(Exhibitor $exhibitor, Question $question)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        if (!$question->getId()) {
            throw new ErrorException('Question id required!');
        }

        $this->exhibitor = $exhibitor;
        $this->question  = $question;
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
        return "exhibitor/{$this->exhibitor->getId()}/answer/question/{$this->question->getId()}";
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