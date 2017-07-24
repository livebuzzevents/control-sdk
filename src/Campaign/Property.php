<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;
use Buzz\Control\Traits\SupportCrud;

/**
 * Class Property
 *
 * @property string $parameter_id
 * @property string $value
 * @property-read \Buzz\Control\Campaign\Parameter $parameter
 */
class Property extends Object
{
    use Morphable,
        SupportCrud;
}
