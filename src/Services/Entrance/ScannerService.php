<?php namespace Buzz\Control\Services\Entrance;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Entrance;
use Buzz\Control\Services\Service;

class ScannerService extends Service
{
    protected static $cast = Entrance\Scanner::class;

    public function get(Entrance $customer, Entrance\Scanner $job)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Entrance id required!');
        }

        if (!$job->getId()) {
            throw new ErrorException('Scanner id required!');
        }

        return $this->callAndCast('get', "customer/{$customer->getId()}/job/{$job->getId()}");
    }

    public function delete(Entrance $customer, Entrance\Scanner $job)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Entrance id required!');
        }

        if (!$job->getId()) {
            throw new ErrorException('Scanner id required!');
        }

        $this->call('delete', "customer/{$customer->getId()}/job/{$job->getId()}");
    }

    public function save(Entrance $customer, Entrance\Scanner $job)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Entrance id required!');
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

    public function deleteMany(Entrance $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Entrance id required!');
        }

        $this->call('delete', "customer/{$customer->getId()}/jobs");
    }

    public function getMany(Entrance $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Entrance id required!');
        }

        return $this->callAndCastMany('get', "customer/{$customer->getId()}/jobs");
    }

    public function saveMany(Entrance $customer, array $jobs)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Entrance id required!');
        }

        foreach ($jobs as $key => $job) {
            $jobs[$key] = $job->toArray();
        }

        return $this->callAndCastMany('post', "customer/{$customer->getId()}/jobs", ['batch' => $jobs]);
    }
}