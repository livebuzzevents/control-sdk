<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;

/**
 * Class MeetingSlot
 *
 * @property \Carbon\Carbon $ends_at
 * @property \Carbon\Carbon $starts_at
 */
class MeetingSlot extends SdkObject
{
    use SupportRead;
}
