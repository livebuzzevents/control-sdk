<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportCrud;

/**
 * Class Link
 *
 * @property-read object $model
 * @property string $model_type
 * @property string $model_id
 * @property string $type
 * @property string $url
 *
 */
class Link extends Object
{
    use SupportCrud;
}
