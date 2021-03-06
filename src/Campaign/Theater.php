<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

/**
 * Class Theater
 *
 * @property string $identifier
 * @property string $name
 * @property string $color
 *
 * @property-read \Buzz\Control\Campaign\Seminar[] $pages
 */
class Theater extends SdkObject
{
    use SupportRead,
        SupportWrite;
}
