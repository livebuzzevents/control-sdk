<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\BadgeType;

class BadgeTypeService extends Service
{
    protected static $cast = BadgeType::class;

    public function get(BadgeType $badge_type)
    {
        if (!$badge_type->getId()) {
            throw new ErrorException('BadgeType id required!');
        }

        return $this->callAndCast('get', "badgeType/{$badge_type->getId()}");
    }

    public function delete(BadgeType $badge_type)
    {
        if (!$badge_type->getId()) {
            throw new ErrorException('BadgeType id required!');
        }

        $this->call('delete', "badgeType/{$badge_type->getId()}");
    }

    public function save(BadgeType $badge_type)
    {
        if (!$badge_type->getId() && !$badge_type->getCampaignId()) {
            throw new ErrorException('BadgeType id or Campaign id required!');
        }

        if ($badge_type->getId()) {
            $verb = 'put';
            $url  = 'badgeType/' . $badge_type->getId();
        } else {
            $verb = 'post';
            $url  = 'badgeType';
        }

        return $this->callAndCast($verb, $url, $badge_type->toArray());
    }

    public function deleteMany()
    {
        $this->call('delete', 'badgeTypes');
    }

    public function getMany()
    {
        return $this->callAndCastMany('get', 'badgeTypes');
    }

    public function saveMany(array $badge_types)
    {
        foreach ($badge_types as $key => $badge_type) {
            if (!$badge_type->getId() && !$badge_type->getCampaignId()) {
                throw new ErrorException('BadgeType id or Campaign id required!');
            }

            $badge_types[$key] = $badge_type->toArray();
        }

        return $this->callAndCastMany('post', 'badgeTypes', $badge_types);
    }
}