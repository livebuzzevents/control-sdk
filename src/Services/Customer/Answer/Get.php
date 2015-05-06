<?php namespace Buzz\Control\Services\Customer\Answer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Campaign;
use Buzz\Control\Objects\Question;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\Customer\Answer;

/**
 * Class Get
 *
 * @package Buzz\Control\Services\Customer\Answer
 */
class Get implements Service
{
    /**
     * @var Customer
     */
    private $customer;
    /**
     * @var Campaign
     */
    private $campaign;
    /**
     * @var Answer
     */
    private $question;

    /**
     * @param Customer     $customer
     * @param Campaign $campaign
     * @param Question $question
     *
     * @throws ErrorException
     */
    public function __construct(Customer $customer, Campaign $campaign, Question $question)
    {
        if (empty($customer->getId())) {
            throw new ErrorException('Customer id required!');
        }

        if (empty($campaign->getId())) {
            throw new ErrorException('Campaign id required!');
        }

        if (empty($question->getId())) {
            throw new ErrorException('Question id required!');
        }

        $this->customer     = $customer;
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
        return "customer/{$this->customer->getId()}/answer/{$this->campaign->getId()}/{$this->question->getId()}";
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