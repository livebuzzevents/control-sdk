<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportCrud;

/**
 * Class Area
 *
 * @property string $identifier
 * @property string $name
 * @property string $color
 * @property string $text_color_hexstring
 */
class Area extends SdkObject
{
    use SupportCrud;
}
