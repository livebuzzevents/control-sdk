<?php

namespace Buzz\Control\Campaign;

/**
 * Class OrderAction
 *
 * @property string $identifier
 * @property string $name
 * @property string $description
 * @property string $order_product_id
 * @property string $order_id
 * @property string $discount_id
 * @property-read string $currency
 * @property-read string $overview
 * @property string $code
 * @property array $settings
 * @property string $type
 * @property-read Order $order
 * @property-read OrderProduct $order_product
 * @property-read Discount $discount
 */
class OrderDiscount extends SdkObject {}
