<?php namespace Buzz\Control\Objects\Traits;

use Buzz\Control\Objects\BadgeStock;

/**
 * Class HasBadgeStock
 *
 * @package Buzz\Control\Objects\Traits
 */
trait HasBadgeStock
{
    /**
     * @var string
     */
    protected $badge_stock_id;

    /**
     * @var \Buzz\Control\Objects\BadgeStock
     */
    protected $badge_stock;

    /**
     * @return \Buzz\Control\Objects\BadgeStock
     */
    public function getBadgeStock()
    {
        return $this->badge_stock;
    }

    /**
     * @param \Buzz\Control\Objects\BadgeStock $badge_stock
     */
    public function setBadgeStock(BadgeStock $badge_stock)
    {
        $this->badge_stock = $badge_stock;
    }

    /**
     * @return string
     */
    public function getBadgeStockId()
    {
        return $this->badge_stock_id;
    }

    /**
     * @param string $badge_stock_id
     */
    public function setBadgeStockId($badge_stock_id)
    {
        $this->badge_stock_id = $badge_stock_id;
    }
}