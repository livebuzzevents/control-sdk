<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\HasFiles;
use Buzz\Control\Traits\SupportRead;
use Buzz\EssentialsSdk\Cast;
use Carbon\Carbon;

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
 * @property-read Carbon $last_deployed_at
 * @property-read string $origin_url
 * @property-read string $custom_origin_url
 * @property-read string $default_origin_url
 * @property-read string $forgotten_password_url
 * @property-read array $social_connect_urls
 * @property-read Affiliate[] $affiliates
 * @property-read BadgeType[] $badge_types
 * @property-read CustomerFlow[] $flows
 * @property-read Page[] $pages
 */
class Stream extends SdkObject
{
    use HasFiles,
        SupportRead;

    public function signedUrl(?array $data = null): string
    {
        return $this->api()->post(sprintf('stream/%s/signed-url', $this->id), $data);
    }

    public function consumableDetails(string $stream): Stream
    {
        return Cast::single(
            (new Stream),
            $this->api()->get(
                $this->getEndpoint($stream.'/consumable-details')
            )
        );
    }
}
