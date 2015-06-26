<?php namespace Buzz\Control\Services\Exhibitor\Answer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;

class Delete implements Service
{
    /**
     * @var Exhibitor
     */
    private $exhibitor;
    /**
     * @var Exhibitor\Answer
     */
    private $answer;

    public function __construct(Exhibitor $exhibitor, Exhibitor\Answer $answer)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        if (!$answer->getId()) {
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
        return 'delete';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "exhibitor/{$this->exhibitor->getId()}/answer/id/{$this->answer->getId()}";
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