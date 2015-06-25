<?php namespace Buzz\Control\Services\Entrance\Scanner;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Entrance;
use Buzz\Control\Objects\Entrance\Scanner;

/**
 * Class Save
 *
 * @package Buzz\Control\Services\Entrance\Scanner
 */
class Save implements Service
{
    /**
     * @var Entrance
     */
    private $entrance;
    /**
     * @var Scanner
     */
    private $scanner;

    /**
     * @param Entrance $entrance
     * @param Scanner  $scanner
     *
     * @throws ErrorException
     */
    public function __construct(Entrance $entrance, Scanner $scanner)
    {
        if (!$entrance->getId()) {
            throw new ErrorException('Entrance id required!');
        }

        $this->entrance = $entrance;
        $this->scanner  = $scanner;
    }

    /**
     * Gets the HTTP verb of the api call
     *
     * @return mixed
     */
    public function getMethod()
    {
        return $this->scanner->getId() ? 'put' : 'post';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "entrance/{$this->entrance->getId()}/scanner" . ($this->scanner->getId() ? "/{$this->scanner->getId()}" : '');
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return $this->scanner->toArray();
    }

    /**
     * @param $response
     *
     * @return static
     */
    public function decorate($response)
    {
        return Scanner::createFromArray($response);
    }
}