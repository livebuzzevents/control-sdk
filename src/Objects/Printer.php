<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\HasBadgeStock;
use Buzz\Control\Objects\Traits\HasIdentifier;

/**
 * Class Printer
 *
 * @package Buzz\Control\Objects\Channel
 */
class Printer extends Base
{
    use HasIdentifier, HasBadgeStock;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $driver;

    /**
     * @var string
     */
    protected $ip;

    /**
     * @var int
     */
    protected $port;

    /**
     * @var string
     */
    protected $active;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDriver()
    {
        return $this->driver;
    }

    /**
     * @param string $driver
     */
    public function setDriver($driver)
    {
        $this->driver = $driver;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param int $port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * @return string
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param string $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

}
