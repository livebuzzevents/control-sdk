<?php

namespace Buzz\Control\Organization;

use Buzz\Control\Traits\SupportRead;

/**
 * Class Channel
 *
 * @property string $identifier
 * @property string $name
 * @property-read Campaign[] $campaigns
 */
class Channel extends SdkObject
{
    use SupportRead;
}
