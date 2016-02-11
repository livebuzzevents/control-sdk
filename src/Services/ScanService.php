<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Scan;

/**
 * Class ScanService
 *
 * @package Buzz\Control\Services
 */
class ScanService extends Service
{
    /**
     * @var
     */
    protected static $cast = Scan::class;

    /**
     * @param Scan $scan
     *
     * @return Scan
     * @throws ErrorException
     */
    public function get(Scan $scan)
    {
        if (!$scan->getId()) {
            throw new ErrorException('Scan id required!');
        }

        return $this->callAndCast('get', "scan/{$scan->getId()}");
    }

    /**
     * @param Scan $scan
     *
     * @throws ErrorException
     */
    public function delete(Scan $scan)
    {
        if (!$scan->getId()) {
            throw new ErrorException('Scan id required!');
        }

        $this->call('delete', "scan/{$scan->getId()}");
    }

    /**
     * @param Scan $scan
     *
     * @return Scan
     * @throws ErrorException
     */
    public function save(Scan $scan)
    {
        if (!$scan->getId() && !$scan->getScannerId() && !$scan->getScanner()) {
            throw new ErrorException('Scan id or Campaign id/identifier required!');
        }

        if ($scan->getId()) {
            $verb = 'put';
            $url  = 'scan/' . $scan->getId();
        } else {
            $verb = 'post';
            $url  = 'scan';
        }

        return $this->callAndCast($verb, $url, $scan->toArray());
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'scans');
    }

    /**
     * @return Scan[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'scans');
    }

    /**
     * @param Scan[] $scans
     *
     * @return Scan[]
     * @throws ErrorException
     */
    public function saveMany(array $scans)
    {
        foreach ($scans as $key => $scan) {
            if (!$scan->getId() && !$scan->getScannerId() && !$scan->getScanner()) {
                throw new ErrorException('Scan id or Campaign id/identifier required!');
            }

            $scans[$key] = $scan->toArray();
        }

        return $this->callAndCastMany('post', 'scans', ['batch' => $scans]);
    }
}