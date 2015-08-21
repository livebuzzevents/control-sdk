<?php namespace Buzz\Control;

/**
 * Class Credentials
 *
 * Holds the api credentials for the SDK REST calls
 *
 * @package Buzz\Control
 */
class Credentials
{
    /**
     * @var
     */
    protected $api_key;
    /**
     * @var
     */
    protected $endpoint;
    /**
     * @var
     */
    protected $organization;
    /**
     * @var
     */
    protected $api_proxy;

    /**
     * Instantiates and fills Rest SDK credentials
     *
     * @param string $api_key
     * @param string $organization
     * @param string $endpoint
     * @param null   $api_proxy
     */
    public function __construct($api_key, $organization, $endpoint, $api_proxy = null)
    {
        $this->setApiKey($api_key);
        $this->setOrganization($organization);
        $this->setEndpoint($endpoint);
        $this->setApiProxy($api_proxy);
    }

    /**
     * Retrieves Event API key
     *
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->api_key;
    }

    /**
     * @param mixed $api_key
     */
    public function setApiKey($api_key)
    {
        $this->api_key = $api_key;
    }

    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * @param mixed $organization
     */
    public function setOrganization($organization)
    {
        $this->organization = $organization;
    }

    /**
     * Retrieves Event endpoint url
     *
     * @return mixed
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @param mixed $endpoint
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    public function getApiProxy()
    {
        return $this->api_proxy;
    }

    /**
     * @param mixed $api_proxy
     */
    public function setApiProxy($api_proxy)
    {
        $this->api_proxy = $api_proxy;
    }
}