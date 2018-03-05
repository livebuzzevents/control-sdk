<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Translatable;
use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

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
 * @property boolean $has_e_badge
 * @property string $e_badge_line_1
 * @property string $e_badge_line_2
 * @property string $e_badge_line_3
 * @property string $e_badge_qrcode
 * @property string $e_badge_html
 * @property-read \Buzz\Control\Campaign\BadgeStock $badge_stock
 * @property-read \Buzz\Control\Campaign\Stream $stream
 * @property-read \Buzz\Control\Campaign\Customer[] $customers
 */
class BadgeType extends SdkObject
{
    use SupportRead,
        SupportWrite,
        Translatable;
}
