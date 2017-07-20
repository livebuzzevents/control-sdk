<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;
use Buzz\Control\Traits\SupportCrud;

/**
 * Class Phone
 *
 * @property-read object $model
 * @property string $model_type
 * @property string $model_id
 * @property string $type
 * @property string $number
 * @property string $verified
 *
 */
class Phone extends Object
{
    use SupportCrud;
}
