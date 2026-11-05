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
 * @property bool $paid_executed
 * @property bool $paid_rolled_back
 * @property bool $completed_executed
 * @property bool $completed_rolled_back
 * @property-read \Buzz\Control\Campaign\Order $order
 * @property-read \Buzz\Control\Campaign\OrderProduct $order_product
 */
class OrderAction extends SdkObject {}
