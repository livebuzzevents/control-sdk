<?php namespace Buzz\Control\Objects\Traits;

use Buzz\Control\Objects\BadgeType;

/**
 * Class HasBadgeType
 *
 * @package Buzz\Control\Objects\Traits
 */
trait HasBadgeType
{
    /**
     * @var int
     */
    protected $badge_type_id;

    /**
     * @var \Buzz\Control\Objects\BadgeType
     */
    protected $badge_type;

    /**
     * @return \Buzz\Control\Objects\BadgeType
     */
    public function getBadgeType()
    {
        return $this->badge_type;
    }

    /**
     * @param \Buzz\Control\Objects\BadgeType $badge_type
     */
    public function setBadgeType(BadgeType $badge_type)
    {
        $this->badge_type = $badge_type;
    }

    /**
     * @return int
     */
    public function getBadgeTypeId()
    {
        return $this->badge_type_id;
    }

    /**
     * @param int $badge_type_id
     */
    public function setBadgeTypeId($badge_type_id)
    {
        $this->badge_type_id = $badge_type_id;
    }
}