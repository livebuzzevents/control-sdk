<?php namespace Buzz\Control\Services\Entrance;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Entrance;
use Buzz\Control\Services\Service;

/**
 * Class ScannerService
 *
 * @package Buzz\Control\Services\Entrance
 */
class ScannerService extends Service
{
    /**
     * @var
     */
    protected static $cast = Entrance\Scanner::class;

    /**
     * @param Entrance         $entrance
     * @param Entrance\Scanner $job
     *
     * @return Entrance\Scanner
     * @throws ErrorException
     */
    public function get(Entrance $entrance, Entrance\Scanner $job)
    {
        if (!$entrance->getId()) {
            throw new ErrorException('Entrance id required!');
        }

        if (!$job->getId()) {
            throw new ErrorException('Scanner id required!');
        }

        return $this->callAndCast('get', "entrance/{$entrance->getId()}/job/{$job->getId()}");
    }

    /**
     * @param Entrance         $entrance
     * @param Entrance\Scanner $job
     *
     * @throws ErrorException
     */
    public function delete(Entrance $entrance, Entrance\Scanner $job)
    {
        if (!$entrance->getId()) {
            throw new ErrorException('Entrance id required!');
        }

        if (!$job->getId()) {
            throw new ErrorException('Scanner id required!');
        }

        $this->call('delete', "entrance/{$entrance->getId()}/job/{$job->getId()}");
    }

    /**
     * @param Entrance         $entrance
     * @param Entrance\Scanner $job
     *
     * @return Entrance\Scanner
     * @throws ErrorException
     */
    public function save(Entrance $entrance, Entrance\Scanner $job)
    {
        if (!$entrance->getId()) {
            throw new ErrorException('Entrance id required!');
        }

        if ($job->getId()) {
            $verb = 'put';
            $url  = "entrance/{$entrance->getId()}/job/{$job->getId()}";
        } else {
            $verb = 'post';
            $url  = "entrance/{$entrance->getId()}/job";
        }

        return $this->callAndCast($verb, $url, $job->toArray());
    }

    /**
     * @param Entrance $entrance
     *
     * @throws ErrorException
     */
    public function deleteMany(Entrance $entrance)
    {
        if (!$entrance->getId()) {
            throw new ErrorException('Entrance id required!');
        }

        $this->call('delete', "entrance/{$entrance->getId()}/jobs");
    }

    /**
     * @param Entrance $entrance
     *
     * @return Entrance\Scanner[]
     * @throws ErrorException
     */
    public function getMany(Entrance $entrance)
    {
        if (!$entrance->getId()) {
            throw new ErrorException('Entrance id required!');
        }

        return $this->callAndCastMany('get', "entrance/{$entrance->getId()}/jobs");
    }

    /**
     * @param Entrance           $entrance
     * @param Entrance\Scanner[] $jobs
     *
     * @return Entrance\Scanner[]
     * @throws ErrorException
     */
    public function saveMany(Entrance $entrance, array $jobs)
    {
        if (!$entrance->getId()) {
            throw new ErrorException('Entrance id required!');
        }

        foreach ($jobs as $key => $job) {
            $jobs[$key] = $job->toArray();
        }

        return $this->callAndCastMany('post', "entrance/{$entrance->getId()}/jobs", ['batch' => $jobs]);
    }
}