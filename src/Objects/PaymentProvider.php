<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToCampaign;
use Buzz\Control\Objects\Traits\HasActive;
use Buzz\Control\Objects\Traits\HasDestination;

/**
 * Class Product
 *
 * @package Buzz\Control\Objects\Channel
 */
class PaymentProvider extends Object
{
    use BelongsToCampaign, HasDestination, HasActive;

    /**
     * @var string
     */
    protected $instructions;

    /**
     * @var string
     */
    protected $provider;

    /**
     * @var array
     */
    protected $settings;

    /**
     * @var array
     */
    protected $fees;

    /**
     * @return string
     */
    public function getInstructions()
    {
        return $this->instructions;
    }

    /**
     * @param string $instructions
     */
    public function setInstructions($instructions)
    {
        $this->instructions = $instructions;
    }

    /**
     * @return array
     */
    public function getFees()
    {
        return $this->fees;
    }

    /**
     * @param array $fees
     */
    public function setFees($fees)
    {
        $this->fees = $fees;
    }

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
    public function setSettings($settings)
    {
        $this->settings = $settings;
    }
}