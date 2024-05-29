<?php

namespace Buzz\Control\Gateway;

use Buzz\Control\Traits\SupportRead;

/**
 * Class Site
 *
 * @property string $site
 * @property string $organization_id
 * @property string $campaign_id
 * @property string $stream_id
 * @property boolean $active
 */
class Site extends SdkObject
{
    use SupportRead;
}
