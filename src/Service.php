<?php

namespace Buzz\Control;

class Service extends \JTDSoft\EssentialsSdk\Core\Service
{
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
        $endpoint = sprintf(
            '%s://%s.%s/%s/%s',
            static::getProtocol(),
            static::getOrganization(),
            static::getDomain(),
            static::getVersion(),
            $method
        );

        return $endpoint;
    }
}
