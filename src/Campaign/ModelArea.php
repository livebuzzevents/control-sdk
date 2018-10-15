<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;

/**
 * Class BadgeStock
 *
 * @property string $area_id
 *
 * @property-read \Buzz\Control\Campaign\Area $area
 */
class ModelArea extends SdkObject
{
    use Morphable;
}
