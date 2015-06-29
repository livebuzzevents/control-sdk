<?php namespace Buzz\Control\Services\Exhibitor\Answer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;

/**
 * Class Save
 *
 * @package Buzz\Control\Services\Exhibitor\Answer
 */
class Save implements Service
{
    /**
     * @var Exhibitor
     */
    private $exhibitor;
    /**
     * @var Exhibitor\Answer
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

        if (!$answer->getId() && !$answer->getQuestionId() && !$answer->getQuestion()) {
            throw new ErrorException('Answer id or Question id required!');
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
        return $this->answer->getId() ? 'put' : 'post';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "exhibitor/{$this->exhibitor->getId()}/answer" . ($this->answer->getId() ? "/{$this->answer->getId()}" : '');
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
        return Exhibitor\Answer::createFromArray($response);
    }
}