<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;

/**
 * Class BulkPrint
 *
 * @property string $name
 * @property string $user_id
 * @property string $badge_stock_id
 * @property array $filters
 * @property array $order
 * @property-only integer $badge_prints_count
 * @property-only integer $badge_prints_printed
 * @property-only integer $badge_prints_pending
 * @property-only integer $last_printed
 * @property-only integer $last_to_print
 *
 * @property-read \Buzz\Control\Campaign\BadgeStock $badge_stock
 * @property-read \Buzz\Control\Campaign\User $user
 */
class BulkPrint extends Object
{
}
