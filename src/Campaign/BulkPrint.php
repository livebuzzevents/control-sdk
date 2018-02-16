<?php

namespace Buzz\Control\Campaign;

/**
 * Class BulkPrint
 *
 * @property string $name
 * @property string $user_id
 * @property string $badge_stock_id
 * @property array $filters
 * @property array $order
 * @property-only int $badge_prints_count
 * @property-only int $badge_prints_printed
 * @property-only int $badge_prints_pending
 * @property-only int $last_printed
 * @property-only int $last_to_print
 *
 * @property-read \Buzz\Control\Campaign\BadgeStock $badge_stock
 * @property-read \Buzz\Control\Campaign\User $user
 */
class BulkPrint extends SdkObject
{
}
