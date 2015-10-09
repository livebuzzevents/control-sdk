<?php namespace Buzz\Control\Objects\Customer;

use Buzz\Control\Objects\Object;
use Buzz\Control\Objects\Traits\BelongsToCustomer;

/**
 * Class Address
 *
 * @package Buzz\Control\Objects\Customer
 */
class Social extends Object
{
    use BelongsToCustomer;

    /**
     * @var string
     */
    protected $provider;

    /**
     * @var string
     */
    protected $provider_id;

    /**
     * @var string
     */
    protected $provider_token;

    /**
     * @var array
     */
    protected $details = [];

    /**
     * @return string
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param string $provider
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;
    }

    /**
     * @return string
     */
    public function getProviderId()
    {
        return $this->provider_id;
    }

    /**
     * @param string $provider_id
     */
    public function setProviderId($provider_id)
    {
        $this->provider_id = $provider_id;
    }

    /**
     * @return string
     */
    public function getProviderToken()
    {
        return $this->provider_token;
    }

    /**
     * @param string $provider_token
     */
    public function setProviderToken($provider_token)
    {
        $this->provider_token = $provider_token;
    }

    /**
     * @return array
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param array $details
     */
    public function setDetails(array $details = null)
    {
        $this->details = $details;
    }
}
