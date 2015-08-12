<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\HasIdentifier;

/**
 * Class Channel
 *
 * @package Buzz\Control\Objects
 */
class Channel extends Object
{
    use HasIdentifier;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $organization_id;

    /**
     * @var Organization
     */
    protected $organization;

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
     * @return int
     */
    public function getOrganizationId()
    {
        return $this->organization_id;
    }

    /**
     * @param int $organization_id
     */
    public function setOrganizationId($organization_id)
    {
        $this->organization_id = $organization_id;
    }

    /**
     * @return Organization
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * @param Organization $organization
     */
    public function setOrganization(Organization $organization)
    {
        $this->organization = $organization;
    }
}