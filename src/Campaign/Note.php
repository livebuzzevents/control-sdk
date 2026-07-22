<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;
use Buzz\Control\Gateway\User;
use Buzz\Control\Traits\SupportCrud;

/**
 * Class Note
 *
 * @property string $user_id
 * @property string $creator_id
 * @property string $model_id
 * @property string $model_type
 * @property string $value
 * @property-read User $user
 * @property-read Customer $creator
 */
class Note extends SdkObject
{
    use Morphable, SupportCrud;
}
