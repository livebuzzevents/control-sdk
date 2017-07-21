<?php

namespace Buzz\Control\Campaign;

/**
 * Class OrderAction
 *
 * @property string $name
 * @property-read string $description
 * @property string $order_product_id
 * @property string $order_id
 * @property array $parameters
 * @property array $results
 * @property string $group
 * @property boolean $paid_executed
 * @property boolean $paid_rolled_back
 * @property boolean $completed_executed
 * @property boolean $completed_rolled_back
 *
 * @property-read \Buzz\Control\Campaign\Order $order
 * @property-read \Buzz\Control\Campaign\OrderProduct $order_product
 */
class OrderAction extends Object
{
}
