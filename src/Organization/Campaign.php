<?php

namespace Buzz\Control\Organization;

use Buzz\Control\Traits\SupportRead;

/**
 * Class Campaign
 *
 * @property string $identifier
 * @property string $name
 * @property string $channel_id
 * @property string $database_id
 * @property string $currency
 * @property int $sequence
 * @property boolean $migrated
 * @property string $dupe_cancelled
 * @property string $dupe_exhibitors
 * @property array $dupe_rules
 * @property array $dashboard_filters
 * @property \DateTime $starts_at
 * @property \DateTime $ends_at
 * @property \DateTime $show_starts_at
 * @property \DateTime $show_ends_at
 * @property \DateTime $reg_ends_at
 * @property string $language
 * @property array $additional_languages
 * @property string $show_timezone
 * @property string $version
 * @property-read array $supported_languages
 * @property-read boolean $multilingual
 * @property-read string $full_name
 * @property-read string $status
 * @property-read array $show_days
 * @property-read boolean $run_cron_jobs
 * @property-read string $system_currency
 * @property-read \Buzz\Control\Organization\Channel $channel
 * @property-read \Buzz\Control\Campaign\File[] $files
 */
class Campaign extends Object
{
    use SupportRead;
}
