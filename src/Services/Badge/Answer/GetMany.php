<?php namespace Buzz\Control\Services\Badge\Answer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Filter;
use Buzz\Control\Objects\Badge;
use Buzz\Control\Objects\Question;

/**
 * Class Search
 *
 * @package Buzz\Control\Services\Badge\Answer
 */
class GetMany implements Service
{
    /**
     * @var Badge
     */
    private $badge;

    /**
     * @var Filter
     */
    private $filter;

    /**
     * @param Badge  $badge
     * @param Filter $filter
     *
     * @throws ErrorException
     */
    public function __construct(Badge $badge, Filter $filter = null)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        $this->badge  = $badge;
        $this->filter = $filter;
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
        return "badge/{$this->badge->getId()}/answer";
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
            $decorated[$key] = Badge\Answer::createFromArray($answer);
        }

        return $decorated;
    }
}