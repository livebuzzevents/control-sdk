<?php namespace Buzz\Control\Services\User\Answer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Campaign;
use Buzz\Control\Objects\Question;
use Buzz\Control\Objects\User;
use Buzz\Control\Objects\User\Answer;

/**
 * Class Get
 *
 * @package Buzz\Control\Services\User\Answer
 */
class Get implements Service
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
     * @var Answer
     */
    private $question;

    /**
     * @param User     $user
     * @param Campaign $campaign
     * @param Question $question
     *
     * @throws ErrorException
     */
    public function __construct(User $user, Campaign $campaign, Question $question)
    {
        if (empty($user->getId())) {
            throw new ErrorException('User id required!');
        }

        if (empty($campaign->getId())) {
            throw new ErrorException('Campaign id required!');
        }

        if (empty($question->getId())) {
            throw new ErrorException('Question id required!');
        }

        $this->user     = $user;
        $this->question = $question;
        $this->campaign = $campaign;
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
        return "user/{$this->user->getId()}/answer/{$this->campaign->getId()}/{$this->question->getId()}";
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
        $response['question']        = Question::createFromArray($response['question']);
        $response['question_option'] = Question\Option::createFromArray($response['question_option']);

        return Answer::createFromArray($response);
    }
}