<?php namespace Buzz\Control\Services\Customer\Answer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Campaign;
use Buzz\Control\Objects\Filter;
use Buzz\Control\Objects\Question;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\Customer\Answer;

/**
 * Class All
 *
 * @package Buzz\Control\Services\Customer\Answer
 */
class All implements Service
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
     * @var Filter
     */
    private $filter;

    /**
     * @param Customer     $customer
     * @param Campaign $campaign
     * @param Filter   $filter
     *
     * @throws ErrorException
     */
    public function __construct(Customer $customer, Campaign $campaign, Filter $filter = null)
    {
        if (empty($customer->getId())) {
            throw new ErrorException('Customer id required!');
        }

        if (empty($campaign->getId())) {
            throw new ErrorException('Campaign id required!');
        }

        $this->customer     = $customer;
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
        return "customer/{$this->customer->getId()}/answer/{$this->campaign->getId()}";
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