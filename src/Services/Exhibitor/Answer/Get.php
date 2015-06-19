<?php namespace Buzz\Control\Services\Exhibitor\Answer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Objects\Question;

/**
 * Class Get
 *
 * @package Buzz\Control\Services\Exhibitor\Answer
 */
class Get implements Service
{
    /**
     * @var Exhibitor
     */
    private $exhibitor;

    /**
     * @var Answer
     */
    private $question;

    /**
     * @param Exhibitor $exhibitor
     * @param Question  $question
     *
     * @throws ErrorException
     */
    public function __construct(Exhibitor $exhibitor, Question $question)
    {
        if (empty($exhibitor->getId())) {
            throw new ErrorException('Exhibitor id required!');
        }

        if (empty($question->getId())) {
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
        return 'get';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "exhibitor/{$this->exhibitor->getId()}/answer/{$this->question->getId()}";
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
        return Exhibitor\Answer::createFromArray($response);
    }
}