<?php namespace Buzz\Control\Objects;

/**
 * Class ReplicationLog
 *
 * @package Buzz\Control\Objects
 */
class Node extends Object
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var string
     */
    protected $can_ping;

    /**
     * @var string
     */
    protected $active;

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

    /**
     * @return string
     */
    public function getCanPing()
    {
        return $this->can_ping;
    }

    /**
     * @param string $can_ping
     */
    public function setCanPing($can_ping)
    {
        $this->can_ping = $can_ping;
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @param string $endpoint
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

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
}