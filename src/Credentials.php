<?php namespace Buzz\Control;

/**
 * Class Credentials
 *
 * Holds the api credentials for the SDK REST calls
 *
 * @package Buzz\Control
 */
/**
 * Class Credentials
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
    private $organization_id;

    /**
     * Instantiates and fills Rest SDK credentials
     *
     * @param $api_key
     * @param $organization_id
     * @param $endpoint
     */
    public function __construct($api_key, $organization_id, $endpoint)
    {
        $this->api_key         = $api_key;
        $this->organization_id = $organization_id;
        $this->endpoint        = $endpoint;
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

    public function getOrganizationId()
    {
        return $this->organization_id;
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