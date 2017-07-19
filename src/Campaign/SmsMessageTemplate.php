<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;
use Buzz\Control\Campaign\Traits\Translatable;

/**
 * Class SmsMessageTemplate
 *
 * @property string $identifier
 * @property string $name
 * @property string $from
 * @property string $message
 *
 * @property-read \Buzz\Control\Campaign\SingleShot[] $single_shots
 */
class SmsMessageTemplate extends Object
{
    use Translatable;
}
