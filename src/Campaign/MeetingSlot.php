<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;

/**
 * Class MeetingSlot
 *
 * @property \DateTime $ends_at
 * @property \DateTime $starts_at
 */
class MeetingSlot extends SdkObject
{
    use SupportRead;
}
