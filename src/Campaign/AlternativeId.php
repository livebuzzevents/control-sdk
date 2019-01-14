<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;
use Buzz\Control\Traits\SupportCrud;

/**
 * Class AlternativeId
 *
 * @property string $type
 * @property string $value
 *
 */
class AlternativeId extends SdkObject
{
    use Morphable,
        SupportCrud;
}
