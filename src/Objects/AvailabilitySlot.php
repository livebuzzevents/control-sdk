<?php

namespace Buzz\Control\Objects;

/**
 * Class AvailabilitySlot
 *
 * @package Buzz\Control\Objects
 */
class AvailabilitySlot extends Base
{
    use Traits\BelongsToCustomer;
    use Traits\BelongsToExhibitor;

    /**
     * @var string
     */
    protected $meeting_id;

    /**
     * @var \Buzz\Control\Objects\Meeting
     */
    protected $meeting;

    /**
     * @var \DateTime
     */
    protected $starts_at;

    /**
     * @var \DateTime
     */
    protected $ends_at;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var bool
     */
    protected $is_booked;

    /**
     * @return \Buzz\Control\Objects\Meeting
     */
    public function getMeeting()
    {
        return $this->meeting;
    }

    /**
     * @return string
     */
    public function getMeetingId()
    {
        return $this->meeting_id;
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
     * Gets value of ends_at.
     *
     * @return \DateTime
     */
    public function getEndsAt()
    {
        return $this->ends_at;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return boolean
     */
    public function getIsBooked()
    {
        return $this->is_booked;
    }
}
