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
    protected $domain;

    /**
     * @var string
     */
    protected $version = 'rest/v2';

    /**
     * @var string
     */
    protected $protocol;

    /**
     * @param null   $api_key
     * @param null   $organization
     * @param null   $domain
     * @param string $protocol
     *
     * @internal param bool $ssl
     */
    public function __construct($api_key = null, $organization = null, $domain = null, $protocol = 'https')
    {
        $this->setApiKey($api_key);
        $this->setOrganization($organization);
        $this->setDomain($domain);
        $this->setProtocol($protocol);
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
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param string $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @return string
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * @param string $protocol
     */
    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
    }

}
