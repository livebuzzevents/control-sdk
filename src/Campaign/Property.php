<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportCrud;

/**
 * Class Property
 *
 * @property-read object $model
 * @property string $model_type
 * @property string $model_id
 * @property string $parameter_id
 * @property string $value
 * @property-read \Buzz\Control\Campaign\Parameter $parameter
 */
class Property extends Object
{
    use SupportCrud;
}
