<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;
use Buzz\Control\Campaign\Traits\Translatable;

/**
 * Class Topic
 *
 * @property string $identifier
 * @property string $name
 * @property string $description
 */
class Topic extends Object
{
    use Translatable;
}
