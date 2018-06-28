<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;
use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

/**
 * Class Allowance
 *
 * @property string achievement_id
 */
class AchievementCompletion extends SdkObject
{
    use Morphable,
        SupportRead,
        SupportWrite;
}
