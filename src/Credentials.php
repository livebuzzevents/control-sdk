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
    protected $organization;

    /**
     * @var string
     */
    protected $host;

    /**
     * @var string
     */
    protected $version = 'rest/v2';

    /**
     * @param null $api_key
     * @param null $organization
     * @param null $host
     */
    public function __construct($api_key = null, $organization = null, $host = null)
    {
        $this->setApiKey($api_key);
        $this->setOrganization($organization);
        $this->setHost($host);
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
     * Retrieves Event host
     *
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param string $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }
}