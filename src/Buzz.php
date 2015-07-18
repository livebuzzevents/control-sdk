<?php namespace Buzz\Control;

/**
 * Class Buzz
 *
 * @package Buzz\Control
 */
class Buzz
{
    /**
     * @var Credentials
     */
    protected static $credentials;

    /**
     * @return Credentials
     */
    public static function getCredentials()
    {
        return self::$credentials;
    }

    /**
     * @param Credentials $credentials
     */
    public static function setCredentials(Credentials $credentials)
    {
        self::$credentials = $credentials;
    }
}
