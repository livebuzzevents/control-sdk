<?php namespace Buzz\Control\Services\Customer\Job;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\Customer\Job;

/**
 * Class Update
 *
 * @package Buzz\Control\Services\Customer\Job
 */
class Update implements Service
{
    /**
     * @var Customer
     */
    private $customer;
    /**
     * @var Job
     */
    private $job;

    /**
     * @param Customer $customer
     * @param Job      $job
     *
     * @throws ErrorException
     */
    public function __construct(Customer $customer, Job $job)
    {
        if (empty($customer->getId())) {
            throw new ErrorException('Customer id required!');
        }

        if (empty($job->getId())) {
            throw new ErrorException('Job id required!');
        }

        $this->customer = $customer;
        $this->job      = $job;
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
        return "customer/{$this->customer->getId()}/job/{$this->job->getId()}";
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return $this->job->toArray();
    }

    /**
     * @param $response
     *
     * @return static
     */
    public function decorate($response)
    {
        return Job::createFromArray($response);
    }
}