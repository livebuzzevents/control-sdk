<?php namespace Buzz\Control\Services\Customer;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Services\Service;

/**
 * Class JobService
 *
 * @package Buzz\Control\Services\Customer
 */
class JobService extends Service
{
    /**
     * @var
     */
    protected static $cast = Customer\Job::class;

    /**
     * @param Customer     $customer
     * @param Customer\Job $job
     *
     * @return Customer\Job
     * @throws ErrorException
     */
    public function get(Customer $customer, Customer\Job $job)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if (!$job->getId()) {
            throw new ErrorException('Job id required!');
        }

        return $this->callAndCast('get', "customer/{$customer->getId()}/job/{$job->getId()}");
    }

    /**
     * @param Customer     $customer
     * @param Customer\Job $job
     *
     * @throws ErrorException
     */
    public function delete(Customer $customer, Customer\Job $job)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if (!$job->getId()) {
            throw new ErrorException('Job id required!');
        }

        $this->call('delete', "customer/{$customer->getId()}/job/{$job->getId()}");
    }

    /**
     * @param Customer     $customer
     * @param Customer\Job $job
     *
     * @return Customer\Job
     * @throws ErrorException
     */
    public function save(Customer $customer, Customer\Job $job)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if ($job->getId()) {
            $verb = 'put';
            $url  = "customer/{$customer->getId()}/job/{$job->getId()}";
        } else {
            $verb = 'post';
            $url  = "customer/{$customer->getId()}/job";
        }

        return $this->callAndCast($verb, $url, $job->toArray());
    }

    /**
     * @param Customer $customer
     *
     * @throws ErrorException
     */
    public function deleteMany(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        $this->call('delete', "customer/{$customer->getId()}/jobs");
    }

    /**
     * @param Customer $customer
     *
     * @return Customer\Job[]
     * @throws ErrorException
     */
    public function getMany(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        return $this->callAndCastMany('get', "customer/{$customer->getId()}/jobs");
    }

    /**
     * @param Customer       $customer
     * @param Customer\Job[] $jobs
     *
     * @return Customer\Job[]
     * @throws ErrorException
     */
    public function saveMany(Customer $customer, array $jobs)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        foreach ($jobs as $key => $job) {
            $jobs[$key] = $job->toArray();
        }

        return $this->callAndCastMany('post', "customer/{$customer->getId()}/jobs", ['batch' => $jobs]);
    }
}