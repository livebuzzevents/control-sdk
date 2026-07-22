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
 * @property-read Printer[] $printers
 * @property-read BadgeType[] $badgeTypes
 */
class BadgeStock extends SdkObject
{
    use SupportRead,
        SupportWrite;
}
