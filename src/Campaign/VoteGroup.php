<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

/**
 * Class VoteGroup
 *
 * @property string $identifier
 * @property string $name
 * @property string $description
 * @property-read int $votes_count
 * @property \Carbon\Carbon $deadline_at
 * @property-read \Buzz\Control\Campaign\Vote[] $votes
 */
class VoteGroup extends SdkObject
{
    use SupportRead,
        SupportWrite;
}
