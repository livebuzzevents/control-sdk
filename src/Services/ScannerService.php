<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Scanner;

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
    protected static $cast = Scanner::class;

    /**
     * @param Scanner $scanner
     *
     * @return Scanner
     * @throws ErrorException
     */
    public function get(Scanner $scanner)
    {
        if (!$scanner->getId()) {
            throw new ErrorException('Scanner id required!');
        }

        return $this->callAndCast('get', "scanner/{$scanner->getId()}");
    }

    /**
     * @param Scanner $scanner
     *
     * @throws ErrorException
     */
    public function delete(Scanner $scanner)
    {
        if (!$scanner->getId()) {
            throw new ErrorException('Scanner id required!');
        }

        $this->call('delete', "scanner/{$scanner->getId()}");
    }

    /**
     * @param Scanner $scanner
     *
     * @return Scanner
     * @throws ErrorException
     */
    public function save(Scanner $scanner)
    {
        if ($scanner->getId()) {
            $verb = 'put';
            $url  = "scanner/{$scanner->getId()}";
        } else {
            $verb = 'post';
            $url  = "scanner";
        }

        return $this->callAndCast($verb, $url, $scanner->toArray());
    }

    /**
     * @throws ErrorException
     */
    public function deleteMany()
    {
        $this->call('delete', "scanners");
    }

    /**
     * @return Scanner[]
     * @throws ErrorException
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', "scanners");
    }

    /**
     * @param Scanner[] $scanners
     *
     * @return Scanner[]
     * @throws ErrorException
     */
    public function saveMany(array $scanners)
    {
        foreach ($scanners as $key => $scanner) {
            $scanners[$key] = $scanner->toArray();
        }

        return $this->callAndCastMany('post', "scanners", ['batch' => $scanners]);
    }

    /**
     * @param array $options
     *
     * @return Scanner
     */
    public function createSmartScan(array $options)
    {
        return $this->callAndCast('post', 'scanner/smart-scan', $options);
    }
}
