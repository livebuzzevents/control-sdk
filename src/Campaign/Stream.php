<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;

/**
 * Class Stream
 *
 * @property string $identifier
 * @property string $name
 * @property string $secret
 * @property string $audience
 * @property string $provider
 * @property string $repository
 * @property string $branch
 * @property string $project
 * @property string $run_gulp
 * @property string $run_scheduler
 * @property array $settings
 * @property array $components
 * @property-read \DateTime $last_deployed_at
 * @property-read string $origin_url
 * @property-read string $custom_origin_url
 * @property-read string $default_origin_url
 * @property-read \Buzz\Control\Campaign\Affiliate[] $affiliates
 * @property-read \Buzz\Control\Campaign\BadgeType[] $badge_types
 * @property-read \Buzz\Control\Campaign\CustomerFlow[] $flows
 * @property-read \Buzz\Control\Campaign\StreamMenuItem[] $stream_menu_items
 */
class Stream extends Object
{
    use SupportRead;
}
