<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Translatable;
use Buzz\Control\Object;
use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

/**
 * Class SmsMessageTemplate
 *
 * @property string $identifier
 * @property string $name
 * @property string $from
 * @property string $message
 * @property-read \Buzz\Control\Campaign\SingleShot[] $single_shots
 */
class SmsMessageTemplate extends Object
{
    use SupportRead,
        SupportWrite,
        Translatable;
}
