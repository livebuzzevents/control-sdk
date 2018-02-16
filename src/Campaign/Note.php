<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;

/**
 * Class Note
 *
 * @property string $user_id
 * @property string $value
 *
 * @property-read \Buzz\Control\Gateway\User $user
 *
 */
class Note extends SdkObject
{
    use Morphable;
}
