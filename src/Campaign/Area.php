<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportCrud;

/**
 * Class Area
 *
 * @property string $identifier
 * @property string $name
 * @property string $color
 */
class Area extends SdkObject
{
    use SupportCrud;
}
