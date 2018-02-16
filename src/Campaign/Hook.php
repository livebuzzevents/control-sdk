<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Refinable;

/**
 * Class Hook
 *
 * @property string $identifier
 * @property string $name
 * @property string $event
 * @property string $action
 * @property array $parameters
 * @property int $priority
 */
class Hook extends SdkObject
{
    use Refinable;
}
