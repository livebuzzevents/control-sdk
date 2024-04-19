<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;
use Buzz\Control\Traits\SupportCrud;

/**
 * Class Link
 *
 * @property string $type
 * @property string $url
 * @property-read bool $is_video
 * @property-read bool $is_embeddable_video
 */
class Link extends SdkObject
{
    use Morphable,
        SupportCrud;
}
