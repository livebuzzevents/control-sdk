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
 * @property-read string $organization_identifier
 * @property-read string $campaign_identifier
 * @property-read string $stream_identifier
 */
class Site extends SdkObject
{
    use SupportRead;
}
