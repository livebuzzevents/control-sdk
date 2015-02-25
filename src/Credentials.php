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
     * Instantiates and fills Rest SDK credentials
     *
     * @param $api_key
     * @param $endpoint
     */
    public function __construct($api_key, $endpoint)
    {
        $this->api_key  = $api_key;
        $this->endpoint = $endpoint;
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
     * Retrieves Event endpoint url
     *
     * @return mixed
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }
}