<?php namespace Buzz\Control\Objects\Traits;

use Buzz\Control\Collection;
use Buzz\Control\Objects\Badge;
use Buzz\Control\Objects\BadgeType;

/**
 * Class HasCreatedBadgesCommon
 *
 * @package Buzz\Control\Objects\Traits
 */
trait HasCreatedBadges
{
    /**
     * @var \Buzz\Control\Objects\Badge[]
     */
    protected $created_badges;

    /**
     * @param BadgeType $badgeType
     *
     * @return bool
     */
    public function hasBadgeOfBadgeType(BadgeType $badgeType)
    {
        return (bool)$this->getBadgeByBadgeType($badgeType);
    }

    /**
     * @param BadgeType $created_badgeType
     *
     * @return null
     */
    public function getCreatedBadgeByBadgeType(BadgeType $created_badgeType)
    {
        if (!$this->created_badges) {
            return null;
        }

        foreach ($this->created_badges as $created_badge) {
            if ($created_badgeType->getId()) {
                if ($created_badge->getBadgeType()->getId() === $created_badgeType->getId()) {
                    return $created_badge;
                }
            } elseif ($created_badgeType->getIdentifier()) {
                if ($created_badge->getBadgeType()->getIdentifier() === $created_badgeType->getIdentifier()) {
                    return $created_badge;
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
    public function getCreatedBadgeByIdentifier($identifier)
    {
        $created_badgeType = new BadgeType();
        $created_badgeType->setIdentifier($identifier);

        return $this->getCreatedBadgeByBadgeType($created_badgeType);
    }

    /**
     * @return static
     */
    public function getCreatedBadgesIdentifiers()
    {
        return $this->getCreatedBadgesGroupedByIdentifier()->keys();
    }

    /**
     * @return Collection|null
     */
    public function getCreatedBadgesGroupedByIdentifier()
    {
        if (!$this->created_badges) {
            return null;
        }

        $created_badges = [];

        foreach ($this->created_badges as $created_badge) {
            $created_badges[$created_badge->getBadgeType()->getIdentifier()] = $created_badge;
        }

        return new Collection($created_badges);
    }

    /**
     * @param array $identifiers
     *
     * @return Collection|null
     */
    public function getCreatedBadgesByIdentifiers(array $identifiers)
    {
        if (!$this->created_badges) {
            return null;
        }

        $created_badges = $this->getCreatedBadgesGroupedByIdentifier();

        $match = null;

        foreach ($created_badges as $identified => $created_badge) {
            if (in_array($identified, $identifiers)) {
                $match[$identified] = $created_badge;
            }
        }

        return $match ?: new Collection($match);
    }

    /**
     * @return mixed
     */
    public function getCreatedBadges()
    {
        return $this->created_badges;
    }

    /**
     * @param Badge[]|Collection $created_badges
     */
    public function setCreatedBadges($created_badges)
    {
        $this->created_badges = new Collection($created_badges);
    }

    /**
     * @param Badge $created_badge
     */
    public function addCreatedBadge(Badge $created_badge)
    {
        $this->add($this->created_badges, $created_badge);
    }
}