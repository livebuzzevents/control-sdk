<?php namespace Buzz\Control;

use Buzz\Control\Contracts\Client;
use Buzz\Control\Contracts\Service;

/**
 * Class ServiceHandler
 *
 * @package LiveBuzz
 */
class ServiceHandler
{
    /**
     * @var Credentials
     */
    protected $credentials;
    /**
     * @var Client
     */
    protected $client;

    /**
     * @param Credentials $credentials
     * @param Client      $client
     */
    public function __construct(Credentials $credentials, Client $client = null)
    {
        $this->credentials = $credentials;
        $this->client      = $client ?: new GuzzleClient($credentials);
    }

    /**
     * Executes a service
     *
     * @param Service $service
     *
     * @return mixed
     */
    public function execute(Service $service)
    {
        return $this->client->{$service->getMethod()}($service->getUrl(), $service->getRequest());
    }
}