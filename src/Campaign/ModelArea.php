<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;

/**
 * Class BadgeStock
 *
 * @property string $area_id
 * @property-read Area $area
 */
class ModelArea extends SdkObject
{
    use Morphable;
}
