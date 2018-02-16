<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

/**
 * Class Entrance
 *
 * @property string $identifier
 * @property string $name
 * @property boolean $handles_crossovers
 * @property-read \Buzz\Control\Campaign\Scanner $scanners
 */
class Entrance extends SdkObject
{
    use SupportRead,
        SupportWrite;
}
