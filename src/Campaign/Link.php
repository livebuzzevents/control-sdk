<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;
use Buzz\Control\Traits\SupportCrud;

/**
 * Class Link
 *
 * @property string $type
 * @property string $url
 *
 */
class Link extends SdkObject
{
    use Morphable,
        SupportCrud;
}
