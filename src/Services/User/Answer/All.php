<?php namespace Buzz\Control\Services\User\Answer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Campaign;
use Buzz\Control\Objects\Filter;
use Buzz\Control\Objects\Question;
use Buzz\Control\Objects\User;
use Buzz\Control\Objects\User\Answer;

/**
 * Class All
 *
 * @package Buzz\Control\Services\User\Answer
 */
class All implements Service
{
    /**
     * @var User
     */
    private $user;

    /**
     * @var Campaign
     */
    private $campaign;
    /**
     * @var Filter
     */
    private $filter;

    /**
     * @param User     $user
     * @param Campaign $campaign
     * @param Filter   $filter
     *
     * @throws ErrorException
     */
    public function __construct(User $user, Campaign $campaign, Filter $filter = null)
    {
        if (empty($user->getId())) {
            throw new ErrorException('User id required!');
        }

        if (empty($campaign->getId())) {
            throw new ErrorException('Campaign id required!');
        }

        $this->user     = $user;
        $this->campaign = $campaign;
        $this->filter   = $filter;
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
        return "user/{$this->user->getId()}/answer/{$this->campaign->getId()}";
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
        foreach ($response as $answer) {
            $answer['question']        = Question::createFromArray($answer['question']);

            if(!empty($answer['question_option'])) {
                $answer['question_option'] = Question\Option::createFromArray($answer['question_option']);
            }

            array_push($decorated, Answer::createFromArray($answer));
        }

        return $decorated;
    }
}