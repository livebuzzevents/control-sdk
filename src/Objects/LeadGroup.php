<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\HasIdentifier;

/**
 * Class Entrance
 *
 * @package Buzz\Control\Objects
 */
class LeadGroup extends Base
{
    use HasIdentifier;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var \DateTime
     */
    protected $expires_at;

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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return \DateTime
     */
    public function getExpiresAt()
    {
        return $this->expires_at;
    }

    /**
     * @param \DateTime|string $expires_at
     */
    public function setExpiresAt($expires_at = '')
    {
        $this->expires_at = $expires_at;
    }
}
