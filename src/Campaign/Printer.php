<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

/**
 * Class Printer
 *
 * @property string $identifier
 * @property string $name
 * @property string $active
 * @property string $badge_stock_id
 * @property string $driver
 * @property string $version
 * @property string $ip
 * @property integer $port
 * @property-read \Buzz\Control\Campaign\BadgeStock $badge_stock
 */
class Printer extends Object
{
    use SupportRead,
        SupportWrite;
}
