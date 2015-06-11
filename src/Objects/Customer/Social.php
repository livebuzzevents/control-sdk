<?php namespace Buzz\Control\Objects\Customer;

use Buzz\Control\Objects\Object;

/**
 * Class Address
 *
 * @package Buzz\Control\Objects\Customer
 */
class Social extends Object
{
    /**
     * @var
     */
    protected $provider;

    /**
     * @var array
     */
    protected $settings = [];
    /**
     * @var
     */
    protected $customer_id;

    /**
     * @return mixed
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param mixed $provider
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;
    }

    /**
     * @return array
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * @param array $settings
     */
    public function setSettings(array $settings = null)
    {
        $this->settings = $settings;
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * @param mixed $customer_id
     */
    public function setCustomerId($customer_id)
    {
        $this->customer_id = $customer_id;
    }
}
