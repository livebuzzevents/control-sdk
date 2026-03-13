<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Translatable;
use Buzz\Control\Traits\SupportCrud;

/**
 * Class CustomStatus
 *
 * @property string $identifier
 * @property string $name
 * @property string $text_colour
 * @property-read \Buzz\Control\Campaign\Customer[] $customers
 */
class CustomStatus extends SdkObject
{
    use SupportCrud;
    use Translatable;
}
