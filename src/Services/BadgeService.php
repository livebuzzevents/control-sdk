<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Badge;
use Buzz\Control\Objects\Printer;

/**
 * Class BadgeService
 *
 * @package Buzz\Control\Services
 */
class BadgeService extends Service
{
    /**
     * @var
     */
    protected static $cast = Badge::class;

    /**
     * @param Badge $badge
     *
     * @return Badge
     * @throws ErrorException
     */
    public function get(Badge $badge)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        return $this->callAndCast('get', "badge/{$badge->getId()}");
    }

    /**
     * @param Badge $badge
     * @param array $configuration
     *
     * @return Badge
     * @throws ErrorException
     */
    public function smartPrint(Badge $badge, array $configuration)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        return $this->cast(
            $this->call('post', "badge/{$badge->getId()}/smart-print", compact('configuration')),
            Printer::class
        );
    }

    /**
     * @param Badge $badge
     *
     * @throws ErrorException
     */
    public function delete(Badge $badge)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        $this->call('delete', "badge/{$badge->getId()}");
    }

    /**
     * @param Badge $badge
     *
     * @return Badge
     * @throws ErrorException
     */
    public function save(Badge $badge)
    {
        if (!$badge->getId() && !$badge->getCampaignId() && !$badge->getCampaign()) {
            throw new ErrorException('Badge id or Campaign id/identifier required!');
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

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'badges');
    }

    /**
     * @return Badge[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'badges');
    }

    /**
     * @param Badge[] $badges
     *
     * @return Badge[]
     * @throws ErrorException
     */
    public function saveMany(array $badges)
    {
        foreach ($badges as $key => $badge) {
            if (!$badge->getId() && !$badge->getCampaignId() && !$badge->getCampaign()) {
                throw new ErrorException('Badge id or Campaign id/identifier required!');
            }

            $badges[$key] = $badge->toArray();
        }

        return $this->callAndCastMany('post', 'badges', ['batch' => $badges]);
    }
}