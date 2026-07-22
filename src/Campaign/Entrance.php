<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

/**
 * Class Entrance
 *
 * @property string $identifier
 * @property string $name
 * @property bool $handles_crossovers
 * @property-read Scanner $scanners
 */
class Entrance extends SdkObject
{
    use SupportRead,
        SupportWrite;
}
