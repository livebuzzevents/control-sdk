<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToCampaign;
use Buzz\Control\Objects\Traits\BelongsToCustomer;
use Buzz\Control\Objects\Traits\BelongsToExhibitor;
use Buzz\Control\Objects\Traits\BelongsToOrderProduct;
use Buzz\Control\Objects\Traits\HasEntrance;
use Buzz\Control\Objects\Traits\HasIdentifier;

/**
 * Class Scanner
 *
 * @package Buzz\Control\Objects\Entrance
 */
class Scanner extends Object
{
    use BelongsToCampaign, BelongsToExhibitor, BelongsToCustomer, BelongsToOrderProduct, HasEntrance, HasIdentifier;

    /**
     * @var string
     */
    protected $active;

    /**
     * @var string
     */
    protected $serial_number;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $purpose;

    /**
     * @var string
     */
    protected $direction;

    /**
     * @var string
     */
    protected $delivery_status;

    /**
     * @var array
     */
    protected $details;

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
    public function getSerialNumber()
    {
        return $this->serial_number;
    }

    /**
     * @param string $serial_number
     */
    public function setSerialNumber($serial_number)
    {
        $this->serial_number = $serial_number;
    }
    
    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
    
    /**
     * @return string
     */
    public function getPurpose()
    {
        return $this->purpose;
    }

    /**
     * @param string $purpose
     */
    public function setPurpose($purpose)
    {
        $this->purpose = $purpose;
    }

    /**
     * @return string
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * @param string $direction
     */
    public function setDirection($direction)
    {
        $this->direction = $direction;
    }

    /**
     * @return string
     */
    public function getDeliveryStatus()
    {
        return $this->delivery_status;
    }

    /**
     * @param string $delivery_status
     */
    public function setDeliveryStatus($delivery_status)
    {
        $this->delivery_status = $delivery_status;
    }

    /**
     * @return mixed
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param array $details
     */
    public function setDetails(array $details)
    {
        $this->details = $details;
    }
}