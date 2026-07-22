<?php

namespace Buzz\Control\Organization;

use Buzz\Control\Campaign\File;
use Buzz\Control\Traits\SupportRead;
use Carbon\Carbon;

/**
 * Class Campaign
 *
 * @property string $identifier
 * @property string $name
 * @property string $channel_id
 * @property string $database_id
 * @property string $currency
 * @property int $sequence
 * @property bool $migrated
 * @property string $dupe_cancelled
 * @property string $dupe_exhibitors
 * @property array $dupe_rules
 * @property array $dashboard_filters
 * @property Carbon $starts_at
 * @property Carbon $ends_at
 * @property Carbon $show_starts_at
 * @property Carbon $show_ends_at
 * @property Carbon $reg_ends_at
 * @property Carbon $hub_ends_at
 * @property string $language
 * @property array $additional_languages
 * @property string $timezone
 * @property string $version
 * @property-read array $supported_languages
 * @property-read bool $multilingual
 * @property-read string $full_name
 * @property-read string $status
 * @property-read array $show_days
 * @property-read Channel $channel
 * @property-read File[] $files
 */
class Campaign extends SdkObject
{
    use SupportRead;
}
