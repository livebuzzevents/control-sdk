<?php namespace Buzz\Control\Services\Customer\Job;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\Customer\Job;

class Create implements Service
{
    /**
     * @var Customer
     */
    private $customer;
    /**
     * @var Job
     */
    private $job;

    public function __construct(Customer $customer, Job $job)
    {
        if (empty($customer->getId())) {
            throw new ErrorException('Customer id required!');
        }

        $this->customer = $customer;
        $this->job  = $job;
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
        return "customer/{$this->customer->getId()}/job";
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

    public function decorate($response)
    {
        return Job::createFromArray($response);
    }
}