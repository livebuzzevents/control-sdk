<?php namespace Buzz\Control\Objects\Exhibitor;

use Buzz\Control\Objects\Object;

/**
 * Class Address
 *
 * @package Buzz\Control\Objects\Exhibitor
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
    protected $exhibitor_id;

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
    public function getExhibitorId()
    {
        return $this->exhibitor_id;
    }

    /**
     * @param mixed $exhibitor_id
     */
    public function setExhibitorId($exhibitor_id)
    {
        $this->exhibitor_id = $exhibitor_id;
    }
}
