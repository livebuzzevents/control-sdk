<?php namespace Buzz\Control\Services\Entrance\Scanner;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Entrance;
use Buzz\Control\Objects\Entrance\Scanner;

class Delete implements Service
{
    /**
     * @var Entrance
     */
    private $entrance;
    /**
     * @var Scanner
     */
    private $scanner;

    public function __construct(Entrance $entrance, Scanner $scanner)
    {
        if (!$entrance->getId()) {
            throw new ErrorException('Entrance id required!');
        }

        if (!$scanner->getId()) {
            throw new ErrorException('Scanner id required!');
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
        return 'delete';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "entrance/{$this->entrance->getId()}/scanner/{$this->scanner->getId()}";
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return [];
    }

    public function decorate($response)
    {
        return true;
    }
}