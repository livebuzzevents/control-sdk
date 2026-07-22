<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;
use Buzz\Control\Gateway\User;

/**
 * Class Log
 *
 * @property string $stream_id
 * @property string $user_id
 * @property string $section
 * @property string $event
 * @property string $data
 * @property string $created_at_microtime
 * @property-read Stream $stream
 * @property-read User $user
 */
class Log extends SdkObject
{
    use Morphable;
}
