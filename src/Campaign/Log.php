<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;

/**
 * Class Log
 *
 * @property string $stream_id
 * @property string $user_id
 * @property string $section
 * @property string $event
 * @property string $data
 * @property string $created_at_microtime
 *
 * @property-read \Buzz\Control\Campaign\Stream $stream
 * @property-read \Buzz\Control\Gateway\User $user
 */
class Log extends SdkObject
{
    use Morphable;
}
