<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;

/**
 * Class BadgeStock
 *
 * @property string $tag_id
 *
 * @property-read \Buzz\Control\Campaign\Tag $tag
 */
class ModelTag extends Object
{
    use Morphable;
}
