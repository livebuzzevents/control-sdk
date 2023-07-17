<?php

namespace Buzz\Control;

class Service extends \Buzz\EssentialsSdk\Service
{
    /**
     * @var string
     */
    protected static $gateway = 'www';

    /**
     * @var string
     */
    protected static $organization;

    /**
     * @var string
     */
    protected static $campaign;

    /**
     * @var string
     */
    protected static $domain;

    /**
     * @var string
     */
    protected static $stream;

    /**
     * @var bool
     */
    protected static $force_campaign_timezone = false;

    /**
     * @var string
     */
    protected static $custom_header_prefix = 'BUZZ-';

    /**
     * @var string
     */
    protected static $version = 'v3';

    /**
     * @var string
     */
    protected $section = 'gateway';

    /**
     * @return string
     */
    public static function getCampaign(): string
    {
        return self::$campaign;
    }

    /**
     * @param string $campaign
     */
    public static function setCampaign(string $campaign)
    {
        self::$campaign = $campaign;
    }

    /**
     * @return string
     */
    public static function getStream(): string
    {
        return self::$stream;
    }

    /**
     * @param string $stream
     */
    public static function setStream(string $stream)
    {
        self::$stream = $stream;
    }

    /**
     * Sets headers for forcing timezone which forces
     * all date-times to return in the campaign
     * timezone so no more messing around with
     * configuring date and times
     *
     * @return void
     */
    public static function forceCampaignTimezones(bool $toggle)
    {
        self::$force_campaign_timezone = $toggle;
    }

    /**
     *
     */
    protected function prepareHeaders()
    {
        if (self::$stream) {
            $this->setCustomHeader('Stream', self::$stream);
        }

        if (self::$force_campaign_timezone) {
            $this->setCustomHeader('force-campaign-timezone', true);
        }

        parent::prepareHeaders();
    }

    /**
     * @param string $method
     *
     * @return string
     */
    protected function getUrl($method)
    {
        if ($this->section == 'organization') {
            $endpoint = sprintf(
                '%s://%s.%s/rest/%s/%s',
                static::getProtocol(),
                static::getOrganization(),
                static::getDomain(),
                static::getVersion(),
                $method
            );
        } elseif ($this->section == 'campaign') {
            $endpoint = sprintf(
                '%s://%s.%s/rest/%s/campaign/%s/%s',
                static::getProtocol(),
                static::getOrganization(),
                static::getDomain(),
                static::getVersion(),
                static::getCampaign(),
                $method
            );
        } else {
            $endpoint = sprintf(
                '%s://%s.%s/rest/%s/%s',
                static::getProtocol(),
                static::getGateway(),
                static::getDomain(),
                static::getVersion(),
                $method
            );
        }

        return $endpoint;
    }

    /**
     * @return string
     */
    public static function getOrganization(): string
    {
        return self::$organization;
    }

    /**
     * @param string $organization
     */
    public static function setOrganization(string $organization)
    {
        self::$organization = $organization;
    }

    /**
     * @return string
     */
    public static function getGateway(): string
    {
        return self::$gateway;
    }

    /**
     * @param string $gateway
     */
    public static function setGateway(string $gateway)
    {
        self::$gateway = $gateway;
    }

    /**
     * @return string
     */
    public static function getDomain(): string
    {
        return self::$domain;
    }

    /**
     * @param string $domain
     */
    public static function setDomain(string $domain)
    {
        self::$domain = $domain;
    }

    /**
     * @param string $section
     */
    public function setSection(string $section): void
    {
        $this->section = $section;
    }
}
