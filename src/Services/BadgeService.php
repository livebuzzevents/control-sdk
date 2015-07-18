<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Badge;

class BadgeService extends Service
{
    protected static $cast = Badge::class;

    public function get(Badge $badge)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        return $this->callAndCast('get', "badge/{$badge->getId()}");
    }

    public function delete(Badge $badge)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        $this->call('delete', "badge/{$badge->getId()}");
    }

    public function save(Badge $badge)
    {
        if (!$badge->getId() && !$badge->getCampaignId()) {
            throw new ErrorException('Badge id or Campaign id required!');
        }

        if ($badge->getId()) {
            $verb = 'put';
            $url  = 'badge/' . $badge->getId();
        } else {
            $verb = 'post';
            $url  = 'badge';
        }

        return $this->callAndCast($verb, $url, $badge->toArray());
    }

    public function deleteMany()
    {
        $this->call('delete', 'badges');
    }

    public function getMany()
    {
        return $this->callAndCastMany('get', 'badges');
    }

    public function saveMany(array $badges)
    {
        foreach ($badges as $key => $badge) {
            if (!$badge->getId() && !$badge->getCampaignId()) {
                throw new ErrorException('Badge id or Campaign id required!');
            }

            $badges[$key] = $badge->toArray();
        }

        return $this->callAndCastMany('post', 'badges', $badges);
    }
}