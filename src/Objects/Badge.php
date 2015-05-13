<?php namespace Buzz\Control\Objects;

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
    protected $customer;

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
     * @return array
     */
    public function getObjectMap()
    {
        return $this->objectMap;
    }

    /**
     * @param array $objectMap
     */
    public function setObjectMap($objectMap)
    {
        $this->objectMap = $objectMap;
    }

    /**
     * @return mixed
     */
    public function getBadgeType()
    {
        return $this->badge_type;
    }

    /**
     * @param BadgeType $badgeType
     */
    public function setBadgeType(BadgeType $badgeType)
    {
        $this->badge_type = $badgeType;
    }

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param mixed $customer
     */
    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
    }
}