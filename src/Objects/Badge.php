<?php namespace Buzz\Control\Objects;

/**
 * Class Badge
 *
 * @package Buzz\Control\Objects
 */
/**
 * Class Badge
 *
 * @package Buzz\Control\Objects
 */
class Badge extends Object
{
    /**
     * @var array
     */
    protected $objectMap = [
        'customer'   => Customer::class,
        'exhibitor'  => Exhibitor::class,
        'badge_type' => BadgeType::class,
        'scans'      => Scan::class
    ];

    /**
     * @var
     */
    protected $badge_type;

    /**
     * @var
     */
    protected $badge_type_id;

    /**
     * @var
     */
    protected $customer;

    /**
     * @var
     */
    protected $customer_id;

    /**
     * @var
     */
    protected $exhibitor;
    /**
     * @var
     */
    protected $exhibitor_id;
    /**
     * @var
     */
    protected $barcode;
    /**
     * @var
     */
    protected $scans = [];

    /**
     * @return mixed
     */
    public function getExhibitor()
    {
        return $this->exhibitor;
    }

    /**
     * @return mixed
     */
    public function getExhibitorId()
    {
        return $this->exhibitor_id;
    }

    /**
     * @param mixed $exhibitor_id
     */
    public function setExhibitorId($exhibitor_id)
    {
        $this->exhibitor_id = $exhibitor_id;
    }

    /**
     * @return mixed
     */
    public function getBadgeTypeId()
    {
        return $this->badge_type_id;
    }

    /**
     * @param mixed $badge_type_id
     */
    public function setBadgeTypeId($badge_type_id)
    {
        $this->badge_type_id = $badge_type_id;
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * @param mixed $customer_id
     */
    public function setCustomerId($customer_id)
    {
        $this->customer_id = $customer_id;
    }

    /**
     * @return mixed
     */
    public function getScans()
    {
        return $this->scans;
    }

    /**
     * @param Scan $scan
     */
    public function addScan(Scan $scan)
    {
        $this->scans[] = $scan;
    }

    /**
     * @return mixed
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * @param mixed $barcode
     */
    public function setBarcode($barcode)
    {
        $this->barcode = $barcode;
    }

    /**
     * @return mixed
     */
    public function getBadgeType()
    {
        return $this->badge_type;
    }

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }
}