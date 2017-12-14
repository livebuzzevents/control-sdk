<?php namespace Buzz\Control\Objects;

/**
 * Class Meeting
 *
 * @package Buzz\Control\Objects
 */
class Meeting extends Base
{
    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $sender_customer_id;

    /**
     * @var \Buzz\Control\Objects\Customer
     */
    protected $sender_customer;

    /**
     * @var string
     */
    protected $recipient_customer_id;

    /**
     * @var \Buzz\Control\Objects\Customer
     */
    protected $recipient_customer;

    /**
     * @var string
     */
    protected $sender_exhibitor_id;

    /**
     * @var \Buzz\Control\Objects\Exhibitor
     */
    protected $sender_exhibitor;

    /**
     * @var string
     */
    protected $recipient_exhibitor_id;

    /**
     * @var \Buzz\Control\Objects\Exhibitor
     */
    protected $recipient_exhibitor;

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
    protected $sender_availability_slot_id;

    /**
     * @var \Buzz\Control\Objects\AvailabilitySlot
     */
    protected $sender_availability_slot;

    /**
     * @var string
     */
    protected $recipient_availability_slot_id;

    /**
     * @var \Buzz\Control\Objects\AvailabilitySlot
     */
    protected $recipient_availability_slot;

    /**
     * @var string
     */
    protected $sender_reason;

    /**
     * @var string
     */
    protected $recipient_reason;

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
     * @return \Buzz\Control\Objects\Customer
     */
    public function getSenderCustomer()
    {
        return $this->sender_customer;
    }

    /**
     * @return string
     */
    public function getSenderCustomerId()
    {
        return $this->sender_customer_id;
    }

    /**
     * @return \Buzz\Control\Objects\Customer
     */
    public function getRecipientCustomer()
    {
        return $this->recipient_customer;
    }

    /**
     * @return string
     */
    public function getRecipientCustomerId()
    {
        return $this->recipient_customer_id;
    }

    /**
     * @return \Buzz\Control\Objects\Exhibitor
     */
    public function getSenderExhibitor()
    {
        return $this->sender_exhibitor;
    }

    /**
     * @return string
     */
    public function getSenderExhibitorId()
    {
        return $this->sender_exhibitor_id;
    }

    /**
     * @return \Buzz\Control\Objects\Exhibitor
     */
    public function getRecipientExhibitor()
    {
        return $this->recipient_exhibitor;
    }

    /**
     * @return string
     */
    public function getRecipientExhibitorId()
    {
        return $this->recipient_exhibitor_id;
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
     * @return \Buzz\Control\Objects\AvailabilitySlot
     */
    public function getSenderAvailabilitySlot()
    {
        return $this->sender_availability_slot;
    }

    /**
     * @return string
     */
    public function getSenderAvailabilitySlotId()
    {
        return $this->sender_availability_slot_id;
    }

    /**
     * @param string $sender_availability_slot_id
     */
    public function setSenderAvailabilitySlotId($sender_availability_slot_id)
    {
        $this->sender_availability_slot_id = $sender_availability_slot_id;
    }

    /**
     * @return \Buzz\Control\Objects\AvailabilitySlot
     */
    public function getRecipientAvailabilitySlot()
    {
        return $this->recipient_availability_slot;
    }

    /**
     * @return string
     */
    public function getRecipientAvailabilitySlotId()
    {
        return $this->recipient_availability_slot_id;
    }

    /**
     * @param string $recipient_availability_slot_id
     */
    public function setRecipientAvailabilitySlotId($recipient_availability_slot_id)
    {
        $this->recipient_availability_slot_id = $recipient_availability_slot_id;
    }

    /**
     * @return string
     */
    public function getSenderReason()
    {
        return $this->sender_reason;
    }

    /**
     * @param string $sender_reason
     */
    public function setSenderReason($sender_reason)
    {
        $this->sender_reason = $sender_reason;
    }

    /**
     * @return string
     */
    public function getRecipientReason()
    {
        return $this->recipient_reason;
    }

    /**
     * @param string $recipient_reason
     */
    public function setRecipientReason($recipient_reason)
    {
        $this->recipient_reason = $recipient_reason;
    }
}
