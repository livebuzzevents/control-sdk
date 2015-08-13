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
     * Instantiates and fills Rest SDK credentials
     *
     * @param string $api_key
     * @param string $organization
     * @param string $endpoint
     */
    public function __construct($api_key, $organization, $endpoint)
    {
        $this->api_key      = $api_key;
        $this->organization = $organization;
        $this->endpoint     = $endpoint;
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

    public function getOrganization()
    {
        return $this->organization;
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
}