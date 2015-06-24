<?php namespace Buzz\Control\Services\Exhibitor\Answer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Filter;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Objects\Question;

/**
 * Class Search
 *
 * @package Buzz\Control\Services\Exhibitor\Answer
 */
class Search implements Service
{
    /**
     * @var Exhibitor
     */
    private $exhibitor;

    /**
     * @var Filter
     */
    private $filter;

    /**
     * @param Exhibitor $exhibitor
     * @param Filter    $filter
     *
     * @throws ErrorException
     */
    public function __construct(Exhibitor $exhibitor, Filter $filter = null)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        $this->exhibitor = $exhibitor;
        $this->filter    = $filter;
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
        return "exhibitor/{$this->exhibitor->getId()}/answer";
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return $this->filter ? ['filters' => $this->filter->getFilters()] : [];
    }

    /**
     * @param $response
     *
     * @return array
     */
    public function decorate($response)
    {
        $decorated = [];

        foreach ($response as $key => $answer) {
            $decorated[$key] = Exhibitor\Answer::createFromArray($answer);
        }

        return $decorated;
    }
}