<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;
use Buzz\Control\Traits\SupportCrud;

/**
 * Class Phone
 *
 * @property string $type
 * @property string $number
 * @property string $verified
 *
 */
class Phone extends Object
{
    use Morphable,
        SupportCrud;
}
