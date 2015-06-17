<?php namespace Buzz\Control\Services\Customer\Answer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\Question;

/**
 * Class Create
 *
 * @package Buzz\Control\Services\Customer\Answer
 */
class Create implements Service
{
    /**
     * @var Customer
     */
    private $customer;
    /**
     * @var array
     */
    private $answer;

    /**
     * @param Customer        $customer
     * @param Customer\Answer $answer
     *
     * @throws ErrorException
     */
    public function __construct(Customer $customer, Customer\Answer $answer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if (!$answer->getQuestionId()) {
            throw new ErrorException('Answer question required!');
        }

        $this->customer = $customer;
        $this->answer   = $answer;
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
        return "customer/{$this->customer->getId()}/answer";
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
     * @return static
     */
    public function decorate($response)
    {
        return $response;
    }
}