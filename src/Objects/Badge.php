<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToCampaign;
use Buzz\Control\Objects\Traits\BelongsToCustomer;
use Buzz\Control\Objects\Traits\BelongsToExhibitor;
use Buzz\Control\Objects\Traits\HasBadgeType;
use Buzz\Control\Objects\Traits\HasSource;

/**
 * Class Badge
 *
 * @package Buzz\Control\Objects
 */
class Badge extends Object
{
    use BelongsToCustomer, BelongsToExhibitor, BelongsToCampaign, HasBadgeType, HasSource;

    /**
     * @var string
     */
    protected $barcode;

    /**
     * @var \Buzz\Control\Objects\Scan[]
     */
    protected $scans;

    /**
     * @var array
     */
    protected $override;

    /**
     * @return array
     */
    public function getOverride()
    {
        return $this->override;
    }

    /**
     * @param array $override
     */
    public function setOverride(array $override)
    {
        $this->override = $override;
    }

    /**
     * @return Scan[]|null
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
     * @return string
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * @param string $barcode
     */
    public function setBarcode($barcode)
    {
        $this->barcode = $barcode;
    }
}