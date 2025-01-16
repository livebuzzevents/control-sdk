<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;

/**
 * Class Note
 *
 * @property string $user_id
 * @property string $creator_id
 * @property string $model_id
 * @property string $model_type
 * @property string $value
 * @property-read \Buzz\Control\Gateway\User $user
 * @property-read \Buzz\Control\Campaign\Customer $creator
 */
class Note extends SdkObject
{
    use Morphable;
}
