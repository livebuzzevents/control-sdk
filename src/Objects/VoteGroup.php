<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\HasIdentifier;

/**
 * Class VoteGroup
 *
 * @package Buzz\Control\Objects
 */
class VoteGroup extends Base
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
    protected $deadline_at;

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
    public function getDeadlineAt()
    {
        return $this->deadline_at;
    }

    /**
     * @param \DateTime|string $deadline_at
     */
    public function setDeadlineAt($deadline_at = '')
    {
        $this->deadline_at = $deadline_at;
    }
}
