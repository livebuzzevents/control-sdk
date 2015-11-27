<?php namespace Buzz\Control\Objects\Traits;

use Buzz\Control\Collection;
use Buzz\Control\Objects\Badge;
use Buzz\Control\Objects\BadgeType;

/**
 * Class HasBadgesCommon
 *
 * @package Buzz\Control\Objects\Traits
 */
trait HasBadges
{
    /**
     * @var \Buzz\Control\Objects\Badge[]
     */
    protected $badges;

    /**
     * @param BadgeType $badgeType
     *
     * @return bool
     */
    public function hasBadgeByBadgeType(BadgeType $badgeType)
    {
        return (bool)$this->getBadgeByBadgeType($badgeType);
    }

    /**
     * @param BadgeType $badgeType
     *
     * @return null
     */
    public function getBadgeByBadgeType(BadgeType $badgeType)
    {
        if (!$this->badges) {
            return null;
        }

        foreach ($this->badges as $badge) {
            if ($badgeType->getId()) {
                if ($badge->getBadgeType()->getId() === $badgeType->getId()) {
                    return $badge;
                }
            } elseif ($badgeType->getIdentifier()) {
                if ($badge->getBadgeType()->getIdentifier() === $badgeType->getIdentifier()) {
                    return $badge;
                }
            }
        }

        return null;
    }

    /**
     * @param $identifier
     *
     * @return null
     */
    public function getBadgeByIdentifier($identifier)
    {
        $badgeType = new BadgeType();
        $badgeType->setIdentifier($identifier);

        return $this->getBadgeByBadgeType($badgeType);
    }

    /**
     * @return static
     */
    public function getBadgesIdentifiers()
    {
        return $this->getBadgesGroupedByIdentifier()->keys();
    }

    /**
     * @return Collection|null
     */
    public function getBadgesGroupedByIdentifier()
    {
        if (!$this->badges) {
            return null;
        }

        $badges = [];

        foreach ($this->badges as $badge) {
            $badges[$badge->getBadgeType()->getIdentifier()] = $badge;
        }

        return new Collection($badges);
    }

    /**
     * @param array $identifiers
     *
     * @return Collection|null
     */
    public function getBadgesByIdentifiers(array $identifiers)
    {
        if (!$this->badges) {
            return null;
        }

        $badges = $this->getBadgesGroupedByIdentifier();

        $match = null;

        foreach ($badges as $identified => $badge) {
            if (in_array($identified, $identifiers)) {
                $match[$identified] = $badge;
            }
        }

        return $match ?: new Collection($match);
    }

    /**
     * @return mixed
     */
    public function getBadges()
    {
        return $this->badges;
    }

    /**
     * @param Badge[]|Collection $badges
     */
    public function setBadges($badges)
    {
        $this->badges = new Collection($badges);
    }

    /**
     * @param Badge $badge
     */
    public function addBadge(Badge $badge)
    {
        $this->add($this->badges, $badge);
    }
}