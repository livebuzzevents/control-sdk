<?php namespace Buzz\Control\Services\Exhibitor\Answer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Objects\Exhibitor\Answer;

/**
 * Class Update
 *
 * @package Buzz\Control\Services\Exhibitor\Answer
 */
class Update implements Service
{
    /**
     * @var Exhibitor
     */
    private $exhibitor;
    /**
     * @var Answer
     */
    private $answer;

    /**
     * @param Exhibitor $exhibitor
     * @param Answer    $answer
     *
     * @throws ErrorException
     */
    public function __construct(Exhibitor $exhibitor, Answer $answer)
    {
        if (empty($exhibitor->getId())) {
            throw new ErrorException('Exhibitor id required!');
        }

        if (empty($answer->getId())) {
            throw new ErrorException('Answer id required!');
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
        return 'put';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "exhibitor/{$this->exhibitor->getId()}/answer/{$this->answer->getId()}";
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
        return Answer::createFromArray($response);
    }
}