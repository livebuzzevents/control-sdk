<?php

namespace Buzz\Control;

class Service extends \JTDSoft\EssentialsSdk\Service
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
     * @var string
     */
    protected static $custom_header_prefix = 'BUZZ-';

    /**
     * @var string
     */
    protected static $version = 'v2';

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
     *
     */
    protected function prepareHeaders()
    {
        if (self::$stream) {
            $this->setCustomHeader('Stream', self::$stream);
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
