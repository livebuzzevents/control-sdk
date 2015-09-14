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
     * @param Entrance\Scanner $scanner
     *
     * @return Entrance\Scanner
     * @throws ErrorException
     */
    public function get(Entrance $entrance, Entrance\Scanner $scanner)
    {
        if (!$entrance->getId()) {
            throw new ErrorException('Entrance id/identifier required!');
        }

        if (!$scanner->getId()) {
            throw new ErrorException('Scanner id required!');
        }

        return $this->callAndCast('get', "entrance/{$entrance->getId()}/scanner/{$scanner->getId()}");
    }

    /**
     * @param Entrance         $entrance
     * @param Entrance\Scanner $scanner
     *
     * @throws ErrorException
     */
    public function delete(Entrance $entrance, Entrance\Scanner $scanner)
    {
        if (!$entrance->getId()) {
            throw new ErrorException('Entrance id required!');
        }

        if (!$scanner->getId()) {
            throw new ErrorException('Scanner id required!');
        }

        $this->call('delete', "entrance/{$entrance->getId()}/scanner/{$scanner->getId()}");
    }

    /**
     * @param Entrance         $entrance
     * @param Entrance\Scanner $scanner
     *
     * @return Entrance\Scanner
     * @throws ErrorException
     */
    public function save(Entrance $entrance, Entrance\Scanner $scanner)
    {
        if (!$entrance->getId()) {
            throw new ErrorException('Entrance id required!');
        }

        if ($scanner->getId()) {
            $verb = 'put';
            $url  = "entrance/{$entrance->getId()}/scanner/{$scanner->getId()}";
        } else {
            $verb = 'post';
            $url  = "entrance/{$entrance->getId()}/scanner";
        }

        return $this->callAndCast($verb, $url, $scanner->toArray());
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

        $this->call('delete', "entrance/{$entrance->getId()}/scanners");
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

        return $this->callAndCastMany('get', "entrance/{$entrance->getId()}/scanners");
    }

    /**
     * @param Entrance           $entrance
     * @param Entrance\Scanner[] $scanners
     *
     * @return Entrance\Scanner[]
     * @throws ErrorException
     */
    public function saveMany(Entrance $entrance, array $scanners)
    {
        if (!$entrance->getId()) {
            throw new ErrorException('Entrance id required!');
        }

        foreach ($scanners as $key => $scanner) {
            $scanners[$key] = $scanner->toArray();
        }

        return $this->callAndCastMany('post', "entrance/{$entrance->getId()}/scanners", ['batch' => $scanners]);
    }
}