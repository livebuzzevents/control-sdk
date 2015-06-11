<?php namespace Buzz\Control\Services\Exhibitor\Answer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Objects\Question;

/**
 * Class Create
 *
 * @package Buzz\Control\Services\Exhibitor\Answer
 */
class Create implements Service
{
    /**
     * @var Exhibitor
     */
    private $exhibitor;
    /**
     * @var Question
     */
    private $question;
    /**
     * @var array
     */
    private $answer;

    /**
     * @param Exhibitor        $exhibitor
     * @param Exhibitor\Answer $answer
     *
     * @throws ErrorException
     */
    public function __construct(Exhibitor $exhibitor, Exhibitor\Answer $answer)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        if (!$answer->getQuestionId()) {
            throw new ErrorException('Answer question required!');
        }

        $this->exhibitor = $exhibitor;
        $this->answer    = $answer;
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
        return "exhibitor/{$this->exhibitor->getId()}/answer";
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
        return $response;
    }
}