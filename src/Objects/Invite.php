<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToCustomer;
use Buzz\Control\Objects\Traits\BelongsToStream;
use Buzz\Control\Objects\Traits\CreatedByCustomer;
use Buzz\Control\Objects\Traits\CreatedByExhibitor;

/**
 * Class Affiliate
 *
 * @package Buzz\Control\Objects
 */
class Invite extends Base
{
    use BelongsToStream, BelongsToCustomer, CreatedByCustomer, CreatedByExhibitor;

    /**
     * @var string
     */
    protected $token;

    /**
     * @var string
     */
    protected $status;

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
    protected $url;

    /**
     * @var string
     */
    protected $subject;

    /**
     * @var string
     */
    protected $message;

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
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
}
