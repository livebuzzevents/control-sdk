<?php namespace Buzz\Control\Services\Customer\Answer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\Question;

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
     * @var Answer
     */
    private $question;

    /**
     * @param Customer $customer
     * @param Question $question
     *
     * @throws ErrorException
     */
    public function __construct(Customer $customer, Question $question)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if (!$question->getId()) {
            throw new ErrorException('Question id required!');
        }

        $this->customer = $customer;
        $this->question = $question;
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
        return "customer/{$this->customer->getId()}/answer/{$this->question->getId()}";
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
        return Customer\Answer::createFromArray($response);
    }
}