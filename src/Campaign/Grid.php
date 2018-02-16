<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Refinable;

/**
 * Class Grid
 *
 * @property string $name
 * @property string $model_type
 * @property array $columns
 * @property string $order
 * @property string $direction
 * @property int $user_id
 * @property-read \Buzz\Control\Gateway\User $user
 */
class Grid extends SdkObject
{
    use Refinable;
}
