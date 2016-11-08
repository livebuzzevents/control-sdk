<?php

namespace Buzz\Control\Objects;

/**
 * Class Seminar
 *
 * @package Buzz\Control\Objects
 */
class Seminar extends Object
{
    use Traits\BelongsToExhibitor;
    use Traits\HasIdentifier;
    use Traits\HasSource;

    /**
     * @var int
     */
    protected $capacity;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var \DateTime
     */
    protected $ends_at;

    /**
     * @var string
     */
    protected $location;

    /**
     * @var string
     */
    protected $settings;

    /**
     * @var \DateTime
     */
    protected $starts_at;

    /**
     * @var string
     */
    protected $title;

    //RELATIONS
    /**
     * @var \Buzz\Control\Objects\Customer[]
     */
    protected $customers;

    /**
     * @var \Buzz\Control\Objects\Customer[]
     */
    protected $speakers;

    /**
     * @var \Buzz\Control\Objects\Customer[]
     */
    protected $attendees;

    /**
     * @var \Buzz\Control\Objects\Topics[]
     */
    protected $topics;

    /**
     * Gets value of capacity.
     *
     * @return int
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Sets value of capacity.
     *
     * @param int $capacity
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    }

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
     * Gets value of ends_at.
     *
     * @return \DateTime
     */
    public function getEndsAt()
    {
        return $this->ends_at;
    }

    /**
     * Sets value of ends_at.
     *
     * @param \DateTime $ends_at
     */
    public function setEndsAt(\DateTime $ends_at)
    {
        $this->ends_at = $ends_at;
    }

    /**
     * Gets value of location.
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Sets value of location.
     *
     * @param string $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * Gets value of settings.
     *
     * @return string
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * Sets value of settings.
     *
     * @param string $settings
     */
    public function setSettings($settings)
    {
        $this->settings = $settings;
    }

    /**
     * Gets value of starts_at.
     *
     * @return \DateTime
     */
    public function getStartsAt()
    {
        return $this->starts_at;
    }

    /**
     * Sets value of starts_at.
     *
     * @param \DateTime $starts_at
     */
    public function setStartsAt(\DateTime $starts_at)
    {
        $this->starts_at = $starts_at;
    }

    /**
     * Gets value of title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets value of title.
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Gets value of customers.
     *
     * @return Customer[]
     */
    public function getCustomers()
    {
        return $this->customers;
    }

    /**
     * Sets value of customers.
     *
     * @param Customer[] $customers
     */
    public function setCustomers($customers)
    {
        $this->customers = $customers;
    }

    /**
     * Gets value of speakers.
     *
     * @return Customer[]
     */
    public function getSpeakers()
    {
        return $this->speakers;
    }

    /**
     * Sets value of speakers.
     *
     * @param Customer[] $speakers
     */
    public function setSpeakers($speakers)
    {
        $this->speakers = $speakers;
    }

    /**
     * Gets value of attendees.
     *
     * @return Customer[]
     */
    public function getAttendees()
    {
        return $this->attendees;
    }

    /**
     * Sets value of attendees.
     *
     * @param Customer[] $attendees
     */
    public function setAttendees($attendees)
    {
        $this->attendees = $attendees;
    }

    /**
     * Gets value of topics.
     *
     * @return Topics[]
     */
    public function getTopics()
    {
        return $this->topics;
    }

    /**
     * Sets value of topics.
     *
     * @param Topics[] $topics
     */
    public function setTopics($topics)
    {
        $this->topics = $topics;
    }
}
