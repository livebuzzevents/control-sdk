<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Translatable;

/**
 * Class CustomStatus
 *
 * @property string $identifier
 * @property string $name
 * @property string $color
 * @property string $text_color
 * @property string $type
 * @property int $order
 */
class CustomType extends SdkObject
{
    use Translatable;
}
