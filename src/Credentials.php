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
     * @var string
     */
    protected $api_key;

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var string
     */
    protected $organization;

    /**
     * @var string
     */
    protected $api_proxy;

    /**
     * @param null $api_key
     * @param null $organization
     * @param null $endpoint
     * @param null $api_proxy
     */
    public function __construct($api_key = null, $organization = null, $endpoint = null, $api_proxy = null)
    {
        $this->setApiKey($api_key);
        $this->setOrganization($organization);
        $this->setEndpoint($endpoint);
        $this->setApiProxy($api_proxy);
    }

    /**
     * Retrieves Event API key
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->api_key;
    }

    /**
     * @param string $api_key
     */
    public function setApiKey($api_key)
    {
        $this->api_key = $api_key;
    }

    /**
     * @return string
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * @param string $organization
     */
    public function setOrganization($organization)
    {
        $this->organization = $organization;
    }

    /**
     * Retrieves Event endpoint url
     *
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @param string $endpoint
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    /**
     * @return string
     */
    public function getApiProxy()
    {
        return $this->api_proxy;
    }

    /**
     * @param string $api_proxy
     */
    public function setApiProxy($api_proxy)
    {
        $this->api_proxy = $api_proxy;
    }
}