<?php namespace Buzz\Control\Services\Customer\Answer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\Customer\Answer;

class Delete implements Service
{
    /**
     * @var Customer
     */
    private $customer;
    /**
     * @var Answer
     */
    private $answer;

    public function __construct(Customer $customer, Answer $answer)
    {
        if (empty($customer->getId())) {
            throw new ErrorException('Customer id required!');
        }

        if (empty($answer->getId())) {
            throw new ErrorException('Answer id required!');
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
        return 'delete';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "customer/{$this->customer->getId()}/answer/{$this->answer->getId()}";
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