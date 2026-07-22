<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;

/**
 * Class BadgeStock
 *
 * @property string $tag_id
 * @property-read Tag $tag
 */
class ModelTag extends SdkObject
{
    use Morphable;
}
