<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\BadgeStock;

/**
 * Class BadgeStockService
 *
 * @package Buzz\Control\Services
 */
class BadgeStockService extends Service
{
    /**
     * @var
     */
    protected static $cast = BadgeStock::class;

    /**
     * @param BadgeStock $badge_stock
     *
     * @return BadgeStock
     * @throws ErrorException
     */
    public function get(BadgeStock $badge_stock)
    {
        if (!$badge_stock->getId()) {
            throw new ErrorException('BadgeStock id required!');
        }

        return $this->callAndCast('get', "badge-stock/{$badge_stock->getId()}");
    }

    /**
     * @param BadgeStock $badge_stock
     *
     * @throws ErrorException
     */
    public function delete(BadgeStock $badge_stock)
    {
        if (!$badge_stock->getId()) {
            throw new ErrorException('BadgeStock id required!');
        }

        $this->call('delete', "badge-stock/{$badge_stock->getId()}");
    }

    /**
     * @param BadgeStock $badge_stock
     *
     * @return BadgeStock
     * @throws ErrorException
     */
    public function save(BadgeStock $badge_stock)
    {
        if ($badge_stock->getId()) {
            $verb = 'put';
            $url  = 'badge-stock/' . $badge_stock->getId();
        } else {
            $verb = 'post';
            $url  = 'badge-stock';
        }

        return $this->callAndCast($verb, $url, $badge_stock->toArray());
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'badge-stocks');
    }

    /**
     * @return BadgeStock[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'badge-stocks');
    }

    /**
     * @param BadgeStock[] $badge_stocks
     *
     * @return BadgeStock[]
     * @throws ErrorException
     */
    public function saveMany(array $badge_stocks)
    {
        foreach ($badge_stocks as $key => $badge_stock) {
            $badge_stocks[$key] = $badge_stock->toArray();
        }

        return $this->callAndCastMany('post', 'badge-stocks', ['batch' => $badge_stocks]);
    }
}
