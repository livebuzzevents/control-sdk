<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Translatable;
use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

/**
 * Class Topic
 *
 * @property string $identifier
 * @property string $name
 * @property string $description
 */
class Topic extends Object
{
    use SupportRead,
        SupportWrite,
        Translatable;
}
