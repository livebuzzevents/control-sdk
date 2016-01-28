<?php namespace Buzz\Control\Objects\Traits;

/**
 * Class BelongsToBadge
 *
 * @package Buzz\Control\Objects\Traits
 */
trait BelongsToBadge
{
    /**
     * @var string
     */
    protected $badge_id;

    /**
     * @var \Buzz\Control\Objects\Badge
     */
    protected $badge;

    /**
     * @return \Buzz\Control\Objects\Badge
     */
    public function getBadge()
    {
        return $this->badge;
    }

    /**
     * @return string
     */
    public function getBadgeId()
    {
        return $this->badge_id;
    }

    /**
     * @param string $badge_id
     */
    public function setBadgeId($badge_id)
    {
        $this->badge_id = $badge_id;
    }
}