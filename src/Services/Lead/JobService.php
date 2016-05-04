<?php namespace Buzz\Control\Services\Lead;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Lead;
use Buzz\Control\Services\Service;

/**
 * Class JobService
 *
 * @package Buzz\Control\Services\Lead
 */
class JobService extends Service
{
    /**
     * @var
     */
    protected static $cast = Lead\Job::class;

    /**
     * @param Lead     $lead
     * @param Lead\Job $job
     *
     * @return Lead\Job
     * @throws ErrorException
     */
    public function get(Lead $lead, Lead\Job $job)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        if (!$job->getId()) {
            throw new ErrorException('Job id required!');
        }

        return $this->callAndCast('get', "lead/{$lead->getId()}/job/{$job->getId()}");
    }

    /**
     * @param Lead     $lead
     * @param Lead\Job $job
     *
     * @throws ErrorException
     */
    public function delete(Lead $lead, Lead\Job $job)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        if (!$job->getId()) {
            throw new ErrorException('Job id required!');
        }

        $this->call('delete', "lead/{$lead->getId()}/job/{$job->getId()}");
    }

    /**
     * @param Lead     $lead
     * @param Lead\Job $job
     *
     * @return Lead\Job
     * @throws ErrorException
     */
    public function save(Lead $lead, Lead\Job $job)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        if ($job->getId()) {
            $verb = 'put';
            $url  = "lead/{$lead->getId()}/job/{$job->getId()}";
        } else {
            $verb = 'post';
            $url  = "lead/{$lead->getId()}/job";
        }

        return $this->callAndCast($verb, $url, $job->toArray());
    }

    /**
     * @param Lead $lead
     *
     * @throws ErrorException
     */
    public function deleteMany(Lead $lead)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        $this->call('delete', "lead/{$lead->getId()}/jobs");
    }

    /**
     * @param Lead $lead
     *
     * @return Lead\Job[]
     * @throws ErrorException
     */
    public function getMany(Lead $lead)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        return $this->callAndCastMany('get', "lead/{$lead->getId()}/jobs");
    }

    /**
     * @param Lead       $lead
     * @param Lead\Job[] $jobs
     *
     * @return Lead\Job[]
     * @throws ErrorException
     */
    public function saveMany(Lead $lead, array $jobs)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        foreach ($jobs as $key => $job) {
            $jobs[$key] = $job->toArray();
        }

        return $this->callAndCastMany('post', "lead/{$lead->getId()}/jobs", ['batch' => $jobs]);
    }
}