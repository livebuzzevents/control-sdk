<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;

/**
 * Class ModelTag
 *
 * @property string $tag_id
 *
 * @property-read \Buzz\Control\Campaign\Tag $tag
 */
class ModelTag extends SdkObject
{
    use Morphable;
}
