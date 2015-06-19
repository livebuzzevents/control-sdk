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
     * @var array
     */
    protected $settings = [];

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
}
