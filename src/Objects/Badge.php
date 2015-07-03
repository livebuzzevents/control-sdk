<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToCampaign;
use Buzz\Control\Objects\Traits\BelongsToCustomer;
use Buzz\Control\Objects\Traits\BelongsToExhibitor;
use Buzz\Control\Objects\Traits\CreatedByCustomer;
use Buzz\Control\Objects\Traits\CreatedByExhibitor;
use Buzz\Control\Objects\Traits\HasAnswersCommon;
use Buzz\Control\Objects\Traits\HasBadgeType;
use Buzz\Control\Objects\Traits\HasSource;
use Buzz\Control\Objects\Traits\HasStatus;

/**
 * Class Badge
 *
 * @package Buzz\Control\Objects
 */
class Badge extends Object
{
    use CreatedByCustomer,
        BelongsToCustomer,
        CreatedByExhibitor,
        BelongsToExhibitor,
        BelongsToCampaign,
        HasBadgeType,
        HasSource,
        HasStatus,
        HasAnswersCommon;

    /**
     * @var string
     */
    protected $barcode;

    /**
     * @var int
     */
    protected $participants;

    /**
     * @var array
     */
    protected $override;

    /**
     * @var \Buzz\Control\Objects\Scan[]
     */
    protected $scans;

    /**
     * @var \Buzz\Control\Objects\Badge\Answer[]
     */
    protected $answers;

    /**
     * @var \Buzz\Control\Objects\Badge\Property[]
     */
    protected $properties;

    /**
     * @return int
     */
    public function getParticipants()
    {
        return $this->participants;
    }

    /**
     * @param int $participants
     */
    public function setParticipants($participants)
    {
        $this->participants = $participants;
    }

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

    /**
     * @return array
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @param Badge\Property $property
     */
    public function addProperty(Badge\Property $property)
    {
        $this->properties[] = $property;
    }
}