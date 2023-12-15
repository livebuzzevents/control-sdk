<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\HasFiles;
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
 * @property array $theme
 * @property-read \DateTime $last_deployed_at
 * @property-read string $origin_url
 * @property-read string $custom_origin_url
 * @property-read string $default_origin_url
 * @property-read string $forgotten_password_url
 * @property-read array $social_connect_urls
 * @property-read \Buzz\Control\Campaign\Affiliate[] $affiliates
 * @property-read \Buzz\Control\Campaign\BadgeType[] $badge_types
 * @property-read \Buzz\Control\Campaign\CustomerFlow[] $flows
 * @property-read \Buzz\Control\Campaign\Page[] $pages
 */
class Stream extends SdkObject
{
    use SupportRead,
        HasFiles;

    public function signedUrl(Customer $customer): string
    {
        return $this->api()->get(sprintf('stream/%s/signed-url', $this->id), [
            'customer_id' => $customer->id
        ]);
    }
}
