<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\WithAnswerHelpers;
use Buzz\Control\Campaign\Traits\WithPropertyHelpers;

/**
 * Class OrderProduct
 *
 * @property string $identifier
 * @property string $name
 * @property string $description
 * @property string $product_id
 * @property string $order_id
 * @property string $customer_id
 * @property string $shippable
 * @property int $cost
 * @property int $cost_final
 * @property-read boolean $cost_overridden
 * @property-read int $cost_refundable
 * @property-read int $cost_refunded
 * @property int $vat
 * @property int $total
 * @property string $vat_percentage
 * @property string $vat_percentage_final
 * @property-read int $vat_refundable
 * @property-read int $vat_refunded
 * @property-read int $total_refunded
 * @property-read boolean $vat_percentage_overridden
 * @property-read string $currency
 * @property-read boolean $returned
 * @property-read \Buzz\Control\Campaign\Order $order
 * @property-read \Buzz\Control\Campaign\Customer $customer
 * @property-read \Buzz\Control\Campaign\Product $product
 * @property-read \Buzz\Control\Campaign\OrderDiscount[] $discounts
 * @property-read \Buzz\Control\Campaign\OrderAction[] $actions
 * @property-read \Buzz\Control\Campaign\OrderAction[] $rollbackable_actions
 */
class OrderProduct extends SdkObject
{
    use WithAnswerHelpers,
        WithPropertyHelpers;
}
