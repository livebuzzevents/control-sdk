<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;
use Buzz\Control\Traits\SupportCrud;

/**
 * Class NotificationMessage
 *
 * @property string $name
 */
class NotificationMessage extends SdkObject
{
    use SupportCrud, Morphable;

}
