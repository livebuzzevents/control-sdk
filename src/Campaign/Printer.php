<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;
use JTDSoft\EssentialsSdk\Core\Collection;

/**
 * Class Printer
 *
 * @property string $identifier
 * @property string $name
 * @property string $active
 * @property string $badge_stock_id
 * @property string $driver
 * @property string $version
 * @property string $ip
 * @property integer $port
 * @property-read \Buzz\Control\Campaign\BadgeStock $badge_stock
 */
class Printer extends Object
{
    /**
     * @param array $attributes
     *
     * @return \Buzz\Control\Campaign\Printer
     */
    public function create(array $attributes): self
    {
        return $this->_create($attributes);
    }

    /**
     *
     */
    public function save(): void
    {
        $this->_save();
    }

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
     * @return \Buzz\Control\Campaign\Printer|null
     */
    public function first(array $filters = []): ?self
    {
        return $this->_first($filters);
    }

    /**
     * @param string $id
     *
     * @return \Buzz\Control\Campaign\Printer|null
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
