<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;
use Carbon\Carbon;

/**
 * Class MeetingSlot
 *
 * @property Carbon $ends_at
 * @property Carbon $starts_at
 */
class MeetingSlot extends SdkObject
{
    use SupportRead;
}
