<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToCampaign;
use Buzz\Control\Objects\Traits\BelongsToCustomer;
use Buzz\Control\Objects\Traits\BelongsToStream;
use Buzz\Control\Objects\Traits\CreatedByCustomer;
use Buzz\Control\Objects\Traits\CreatedByExhibitor;

/**
 * Class Affiliate
 *
 * @package Buzz\Control\Objects
 */
class Invite extends Object
{
    use BelongsToStream, BelongsToCampaign, BelongsToCustomer, CreatedByCustomer, CreatedByExhibitor;

    /**
     * @var string
     */
    protected $token;

    /**
     * @var string
     */
    protected $provider;

    /**
     * @var string
     */
    protected $provider_sender;

    /**
     * @var string
     */
    protected $provider_recipient;

    /**
     * @var string
     */
    protected $status;

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

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
     * @return mixed
     */
    public function getProviderSender()
    {
        return $this->provider_sender;
    }

    /**
     * @param mixed $providerSender
     */
    public function setProviderSender($providerSender)
    {
        $this->provider_sender = $providerSender;
    }

    /**
     * @return mixed
     */
    public function getProviderRecipient()
    {
        return $this->provider_recipient;
    }

    /**
     * @param mixed $providerRecipient
     */
    public function setProviderRecipient($providerRecipient)
    {
        $this->provider_recipient = $providerRecipient;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}