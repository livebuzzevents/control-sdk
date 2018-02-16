<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

/**
 * Class BadgeStock
 *
 * @property string $name
 * @property string $identifier
 * @property int $width
 * @property int $height
 * @property array $elements
 * @property array $images
 *
 * @property-read \Buzz\Control\Campaign\Printer[] $printers
 * @property-read \Buzz\Control\Campaign\BadgeType[] $badgeTypes
 */
class BadgeStock extends SdkObject
{
    use SupportRead,
        SupportWrite;
}
