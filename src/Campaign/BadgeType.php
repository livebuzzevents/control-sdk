<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;
use Buzz\Control\Objects\Traits\Translatable;

/**
 * Class BadgeType
 *
 * @property string $identifier
 * @property string $name
 * @property string $print_name
 * @property string $badge_stock_id
 * @property string $stream_id
 * @property string $color
 * @property array $settings
 * @property string $url
 * @property string $e_badge_line_1
 * @property string $e_badge_line_2
 * @property string $e_badge_line_3
 * @property string $e_badge_qrcode
 * @property string $e_badge_html
 *
 * @property-read \Buzz\Control\Campaign\BadgeStock $badge_stock
 * @property-read \Buzz\Control\Campaign\Stream $stream
 * @property-read \Buzz\Control\Campaign\Customer[] $customers
 */
class BadgeType extends Object
{
    use Translatable;
}
