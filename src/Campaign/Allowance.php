<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;
use Buzz\Control\Campaign\Traits\Refinable;
use Buzz\Control\Traits\SupportCrud;

/**
 * Class Allowance
 *
 * @property string $entitlement
 * @property array $settings
 * @property int $amount
 * @property string $order_product_id
 * @property-read int $redeemed
 * @property-read int $remaining
 * @property-read \Buzz\Control\Campaign\OrderProduct $orderProduct
 * @property-read \Buzz\Control\Campaign\Redemption[] $redemptions
 */
class Allowance extends Object
{
    use Morphable,
        Refinable,
        SupportCrud;
}
