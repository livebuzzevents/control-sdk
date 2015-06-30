<?php namespace Buzz\Control\Services\Customer\Answer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;

/**
 * Class SaveMany
 *
 * @package Buzz\Control\Services\Customer\Answer
 */
class SaveMany implements Service
{
    /**
     * @var Customer
     */
    private $customer;
    /**
     * @var Customer\Answer[]
     */
    private $answers;

    /**
     * @param Customer          $customer
     * @param Customer\Answer[] $answers
     *
     * @throws ErrorException
     */
    public function __construct(Customer $customer, $answers)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        foreach ($answers as $answer) {
            if (!$answer->getId() && !$answer->getQuestionId() && !$answer->getQuestion()) {
                throw new ErrorException('Answer id or Question id required!');
            }
        }

        $this->customer = $customer;
        $this->answers  = $answers;
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
        return "customer/{$this->customer->getId()}/answers";
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        foreach ($this->answers as &$answer) {
            $answer = $answer->toArray();
        }

        return $this->answers;
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