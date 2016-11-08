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
    protected $campaign;

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
     * @var string
     */
    protected $proxy = null;

    /**
     * @var bool
     */
    protected $verify_ssl = null;

    /**
     * @param string $api_key
     * @param string $organization
     * @param string $campaign
     * @param string $domain
     * @param string $protocol
     */
    public function __construct(
        $api_key = null,
        $organization = null,
        $campaign = null,
        $domain = null,
        $protocol = 'https'
    ) {
        $this->setApiKey($api_key);
        $this->setOrganization($organization);
        $this->setCampaign($campaign);
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
     * @return string
     */
    public function getCampaign()
    {
        return $this->campaign;
    }

    /**
     * @param string $campaign
     */
    public function setCampaign($campaign)
    {
        $this->campaign = $campaign;
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

    /**
     * @return string
     */
    public function getProxy()
    {
        return $this->proxy;
    }

    /**
     * @param string $proxy
     */
    public function setProxy($proxy)
    {
        $this->proxy = $proxy;
    }

    /**
     * @return bool
     */
    public function getVerifySsl()
    {
        return $this->verify_ssl;
    }

    /**
     * @param bool $verify_ssl
     */
    public function setVerifySsl($verify_ssl)
    {
        $this->verify_ssl = $verify_ssl;
    }

    /**
     * @return bool
     */
    public function verify()
    {
        if (!is_null($this->verify_ssl)) {
            return $this->verify_ssl;
        }

        if (!is_null($this->proxy)) {
            return false;
        }

        return true;
    }
}
