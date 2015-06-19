<?php namespace Buzz\Control\Services\Customer\Answer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;

/**
 * Class Update
 *
 * @package Buzz\Control\Services\Customer\Answer
 */
class Update implements Service
{
    /**
     * @var Customer
     */
    private $customer;
    /**
     * @var Customer\Answer
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
        return 'put';
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
        return $this->answer->toArray();
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