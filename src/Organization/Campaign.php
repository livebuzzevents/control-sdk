<?php

namespace Buzz\Control\Organization;

use Buzz\Control\Object;
use JTDSoft\EssentialsSdk\Core\Collection;

/**
 * Class Campaign
 *
 * @property string $identifier
 * @property string $name
 * @property string $channel_id
 * @property string $currency
 * @property integer $sequence
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
 * @property \DateTime $multilingual
 * @property string $language
 * @property array $additional_languages
 * @property array $supported_languages
 * @property-read string $full_name
 * @property-read string $status
 * @property-read array $show_days
 * @property-read boolean $run_cron_jobs
 * @property-read string $system_currency
 * @property-read \Buzz\Control\Organization\Channel $channel
 * @property-read \Buzz\Control\Campaign\File $files
 */
class Campaign extends Object
{
    /**
     * @param array $filters
     * @param int $page
     * @param int $per_page
     *
     * @return \JTDSoft\EssentialsSdk\Core\Collection
     */
    public function get(array $filters = [], $page = 1, $per_page = 50): Collection
    {
        return $this->_get($filters, $page, $per_page);
    }

    /**
     * @param array $filters
     *
     * @return \Buzz\Control\Organization\Campaign|null
     */
    public function first(array $filters = []): ?self
    {
        return $this->_first($filters);
    }

    /**
     * @param string $id
     *
     * @return \Buzz\Control\Organization\Campaign|null
     */
    public function find(string $id): ?self
    {
        return $this->_find($id);
    }

    /**
     *
     */
    public function reload(): void
    {
        $this->_reload();
    }
}
