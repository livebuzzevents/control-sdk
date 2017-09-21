<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;
use JTDSoft\EssentialsSdk\Cast;

/**
 * Class PaymentProvider
 *
 * @property string $identifier
 * @property string $name
 * @property bool $hide_onsite
 * @property bool $hide_prereg
 * @property int $min_amount
 * @property int $max_amount
 * @property string $provider
 * @property string $instructions
 * @property array $settings
 * @property array $fees
 * @property string $destination
 * @property string $active
 *
 * @property-read \Buzz\Control\Campaign\Charge[] $charges
 */
class PaymentProvider extends Object
{
    use SupportRead;

    /**
     * @param string $basket_id
     *
     * @return iterable|mixed
     */
    public function availableForBasket(string $basket_id)
    {
        return Cast::many(
            static::class,
            $this->api()->get('available-for-basket/' . $basket_id)
        );
    }

    /**
     * @param string $order_id
     *
     * @return iterable|mixed
     */
    public function availableForOrder(string $order_id)
    {
        return Cast::many(
            static::class,
            $this->api()->get('available-for-order/' . $order_id)
        );
    }
}
