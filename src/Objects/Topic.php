<?php

namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits;

/**
 * Class Topic
 *
 * @package Buzz\Control\Objects
 */
class Topic extends Object
{
    use Traits\BelongsToCampaign;
    use Traits\HasIdentifier;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $name;

    /**
     * Gets value of description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets value of description.
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Gets value of name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets value of name.
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}
