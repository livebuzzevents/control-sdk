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
        return $service->decorate($this->client->request($service->getMethod(), $service->getUrl(), $service->getRequest()));
    }
}